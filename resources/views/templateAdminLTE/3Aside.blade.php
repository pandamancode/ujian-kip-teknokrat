<aside class="main-sidebar sidebar-light-danger elevation-4">
    @if(auth()->guard('admin')->check())
    <a href="{{ route('admin.dashboard') }}" class="brand-link bg-danger">
        <img src="https://teknokrat.ac.id/wp-content/uploads/2022/04/UNIVERSITASTEKNOKRAT-e1647677057867-768x774-min.png"
            alt="Logo Universitas Teknokrat Indonesia" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Admin SPMB</span>
    </a>
    @else
    <a href="{{ route('dashboard') }}" class="brand-link bg-danger">
        <img src="https://teknokrat.ac.id/wp-content/uploads/2022/04/UNIVERSITASTEKNOKRAT-e1647677057867-768x774-min.png"
            alt="Logo Universitas Teknokrat Indonesia" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Daftar SPMB</span>
    </a>
    @endif
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if(auth()->guard('admin')->check())
                    @include('templateAdminLTE.sidebar.admin')
                @else
                    @include('templateAdminLTE.sidebar.user')
                @endif
            </ul>
        </nav>
    </div>
</aside>
