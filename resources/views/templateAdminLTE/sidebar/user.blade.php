<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
        <i class="fa fa-home nav-icon {{ request()->is('dashboard*') ? 'text-white' : 'text-dark' }}"></i>
        <p>Halaman Utama</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('user.ujian') }}" class="nav-link {{ request()->is('ujian*') ? 'active' : '' }}">
        <i class="fa fa-file nav-icon {{ request()->is('ujian*') ? 'text-white' : 'text-dark' }}"></i>
        <p>Test Online </p>
    </a>
</li>