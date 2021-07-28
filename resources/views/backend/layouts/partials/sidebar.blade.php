 {{-- <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end --> --}}

    @php
    $usr = Auth::guard('admin')->user();
    @endphp

    <!-- ########## START: LEFT PANEL ########## -->
    {{-- @if ($usr->can('dashboard.view')) --}}
    <div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i>Dashboard</a></div>
    {{-- @endif --}}



    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        {{-- @if ($usr->can('dashboard.view')) --}}
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link @yield('dashboard')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
            {{-- @endif --}}


            {{-- @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')) --}}
        <a href="#" class="sl-menu-link @yield('all_roles')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-person-stalker tx-20"></i>
            <span class="menu-item-label">Roles & Permissions</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_roles_d')">
          <li class="nav-item"><a href="{{ route('admin.roles.index') }}" class="nav-link @yield('view_roles')">All Roles</a></li>
          <li class="nav-item"><a href="{{ route('admin.roles.create') }}" class="nav-link @yield('create_roles')">Create Roles</a></li>
          <li class="nav-item"><a href="{{ route('admin.admins.index') }}" class="nav-link @yield('view_admins')">All Admins</a></li>
          <li class="nav-item"><a href="{{ route('admin.admins.create') }}" class="nav-link @yield('create_admins')">Create Admins</a></li>
          <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link @yield('view_users')">All Users</a></li>
          <li class="nav-item"><a href="{{ route('admin.users.create') }}" class="nav-link @yield('create_users')">Create Users</a></li>

        </ul>

{{-- @endif --}}
        <a href="#" class="sl-menu-link @yield('category')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-navicon-round tx-24"></i>
            <span class="menu-item-label">Manage Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_category')">
          <li class="nav-item"><a href="{{ route('admin.category.create') }}" class="nav-link @yield('create_category')">Create Category</a></li>
          <li class="nav-item"><a href="{{ route('admin.category.index') }}" class="nav-link @yield('view_category')">Category List</a></li>
          <li class="nav-item"><a href="{{ route('admin.subcategory.create') }}" class="nav-link @yield('create_subcategory')">Create SubCategory</a></li>
          <li class="nav-item"><a href="{{ route('admin.subcategory.index') }}" class="nav-link @yield('view_subcategory')">SubCategory List</a></li>
          <li class="nav-item"><a href="{{ route('admin.subsubcategory.create') }}" class="nav-link @yield('create_subsubcategory')">Create SubSubCategory</a></li>
          <li class="nav-item"><a href="{{ route('admin.subsubcategory.index') }}" class="nav-link @yield('view_subsubcategory')">SubSubCategory List</a></li>
        </ul>
        <a href="#" class="sl-menu-link @yield('attribute')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Manage Attribute</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_attribute')">
          <li class="nav-item"><a href="" class="nav-link @yield('create_color')">Create Color</a></li>
          <li class="nav-item"><a href="{{ route('admin.color.index') }}" class="nav-link @yield('view_color')">Color List</a></li>
          <li class="nav-item"><a href="" class="nav-link @yield('create_size')">Create Size</a></li>
          <li class="nav-item"><a href="" class="nav-link @yield('view_size')">Size List</a></li>
        </ul>
        <a href="#" class="sl-menu-link @yield('brand')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ipod tx-24"></i>
            <span class="menu-item-label">Brand</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_brand')">
          <li class="nav-item"><a href="{{ route('admin.brand.create') }}" class="nav-link @yield('create_brand')">Create Brand</a></li>
          <li class="nav-item"><a href="{{ route('admin.brand.index') }}" class="nav-link @yield('view_brand')">Brand List</a></li>
        </ul>
        <a href="#" class="sl-menu-link @yield('product')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-woman tx-24"></i>
            <span class="menu-item-label">Manage Product</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_product')">
          <li class="nav-item"><a href="{{ route('admin.product.create') }}" class="nav-link @yield('create_product')">Create Product</a></li>
          <li class="nav-item"><a href="{{ route('admin.product.index') }}" class="nav-link @yield('view_product')">Product List</a></li>
        </ul>
        <a href="#" class="sl-menu-link @yield('blog')">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-paw tx-24"></i>
            <span class="menu-item-label">Manage Blog</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_blog')">
          <li class="nav-item"><a href="{{ route('admin.create_blog') }}" class="nav-link @yield('create_blog')">Create Blog</a></li>
          <li class="nav-item"><a href="{{ route('admin.view_blog') }}" class="nav-link @yield('view_blog')">Blog List</a></li>
        </ul>
        <a href="#" class="sl-menu-link @yield('orders')">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-sort tx-24"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column @yield('all_orders')">
          <li class="nav-item"><a href="{{ route('admin.view_order') }}" class="nav-link @yield('view_orders')">View Orders</a></li>
        </ul>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->