<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <i class="fa fa-home nav-icon {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-dark' }}"></i>
        <p>Halaman Utama</p>
    </a>
</li>
@if (Auth::guard('admin')->user()->level == 'admin')
    <li class="nav-item">
        <a href="{{ route('admin.pengguna.index') }}"
            class="nav-link {{ request()->is('admin/pengguna') ? 'active' : '' }}">
            <i class="fa fa-user nav-icon {{ request()->is('admin/pengguna*') ? 'text-white' : 'text-dark' }}"></i>
            <p>Pengguna</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.kategori') }}" class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }} ">
            <i class="fa fa-list nav-icon {{ request()->is('admin/kategori*') ? 'text-white' : 'text-dark' }}"></i>
            <p>Kategori Soal </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.soal') }}" class="nav-link {{ request()->is('admin/soal*') ? 'active' : '' }} ">
            <i class="fa fa-edit nav-icon {{ request()->is('admin/soal*') ? 'text-white' : 'text-dark' }}"></i>
            <p>Soal </p>
        </a>
    </li>
@endif
<li class="nav-item">
    <a href="{{ url('admin/pendaftar') }}" class="nav-link {{ request()->is('admin/pendaftar*') ? 'active' : '' }} ">
        <i class="fa fa-users nav-icon {{ request()->is('admin/pendaftar*') ? 'text-white' : 'text-dark' }}"></i>
        <p>Data Pendaftar </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('admin/ujian') }}" class="nav-link {{ request()->is('admin/ujian*') ? 'active' : '' }} ">
        <i class="fa fa-file nav-icon {{ request()->is('admin/ujian*') ? 'text-white' : 'text-dark' }}"></i>
        <p>Sudah Ujian </p>
    </a>
</li>

