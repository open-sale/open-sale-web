<li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.categories.index') }}">
        <i class="nav-icon fa fa-folder"></i>
        <span>Categories</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.products.index') }}">
        <i class="nav-icon fa fa-barcode"></i>
        <span>Products</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/carts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.carts.index') }}">
        <i class="nav-icon fa fa-shopping-basket"></i>
        <span>Carts</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="nav-icon icon-user"></i>
        <span>Users</span>
    </a>
</li>
