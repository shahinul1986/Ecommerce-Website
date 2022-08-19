<?php

namespace App\Providers;

use App\Models\Size;
use App\Policies\BrandPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ColorPolicy;
use App\Policies\DistrictPolicy;
use App\Policies\SizePolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('category-list', [CategoryPolicy::class, 'viewAny']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);
        Gate::define('user-list', [UserPolicy::class, 'viewAny']);
        Gate::define('size-list', [SizePolicy::class, 'viewAny']);
        Gate::define('tag-list', [TagPolicy::class, 'viewAny']);
        Gate::define('color-list', [ColorPolicy::class, 'viewAny']);
        Gate::define('course-list', [CoursePolicy::class, 'viewAny']);
        Gate::define('brand-list', [BrandPolicy::class, 'viewAny']);
        Gate::define('district-list', [DistrictPolicy::class, 'viewAny']);
        // Gate::define('user-delete', [UserPolicy::class, 'delete']);

        Gate::define('product-list', function (User $user) {
            return $user->role_id === 1;
        });
        // Gate::define('user-list', function (User $user) {
        // return $user->role_id === 1 ;
        // }); 



    }
}
