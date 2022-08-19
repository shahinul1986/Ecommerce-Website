<?php
 
namespace App\View\Composers;

use Illuminate\View\View;
 
class CartComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $carts;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'cartItems' => auth()->user()?->cart?->items->pluck('product_id', 'id')->toArray() ?? []
        ]);
    }
}