<aside id="leftsidebar" class="sidebar">
    {{-- User Info --}}
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('ui/backend/assets/images/user.jpg') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name; }}</div>
            <div class="email">{{ Auth::user()->email; }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    {{-- <li><a href="{{ route('customer.login') }}"><i class="material-icons">input</i>Sign Out</a></li> --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="profile-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- #User Info --}}
    {{-- Menu --}}
    <div class="menu">
        <ul class="list">
            @if (Request::is('admin*'))
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                <a href="{{ route('admin.sliders.index') }}">
                    <i class="material-icons">slideshow</i>
                    <span>Slider</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}">
                    <i class="material-icons">category</i>
                    <span>Category</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/sizes*') ? 'active' : '' }}">
                <a href="{{ route('admin.sizes.index') }}">
                    <i class="material-icons">straighten</i>
                    <span>Size</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
                <a href="{{ route('admin.tags.index') }}">
                    <i class="material-icons">sell</i>
                    <span>Tag</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/colors*') ? 'active' : '' }}">
                <a href="{{ route('admin.colors.index') }}">
                    <i class="material-icons">palette</i>
                    <span>Color</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/courses*') ? 'active' : '' }}">
                <a href="{{ route('admin.courses.index') }}">
                    <i class="material-icons">cast_for_education</i>
                    <span>Course</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/brands*') ? 'active' : '' }}">
                <a href="{{ route('admin.brands.index') }}">
                    <i class="material-icons">workspace_premium</i>
                    <span>Brand</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/districts*') ? 'active' : '' }}">
                <a href="{{ route('admin.districts.index') }}">
                    <i class="material-icons">pin_drop</i>
                    <span>Discrict</span>
                </a>
            </li>
            @can('product-list')
            <li class="{{ Request::is('admin/products*') ? 'active' : '' }}">
                <a href="{{ route('admin.products.index') }}">
                    <i class="material-icons">widgets</i>
                    <span>Product</span>
                </a>
            </li>
            @endcan

            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="material-icons">face</i>
                    <span>User</span>
                </a>
            </li>

            <li class="header">System</li>

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i>
                    <span>Sign Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
    </div>
    {{-- #Menu --}}
    {{-- Footer --}}
    <div class="legal">
        <div class="copyright">
            &copy; <a href="{{route('public.index')}}">Amazing</a>. All Rights Reserved. Developed
            by <br><a href="#" target="_blank">Dev_MSDF.</a> <b>Version: </b> 1.0.0
        </div>
    </div>
    {{-- #Footer --}}
</aside>