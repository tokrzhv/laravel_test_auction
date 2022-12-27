<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('main.index') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light"> Go to Lots</span>
    </a>
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Main
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.lot.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Lots
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
