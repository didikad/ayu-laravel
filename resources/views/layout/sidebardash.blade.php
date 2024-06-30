<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">

            <span class="text-warning">Halaman Admin</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- @dd(Request::is('admin')); --}}
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ Request::is('admin/agenda') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/agenda">
            <i class="fas fa-calendar-alt"></i>
            <span>Agenda Pertemuan</span></a>
    </li>

    <li class="nav-item {{ Request::is('admin/') ? 'active' : '' }}">
        <a class="nav-link" href="">
            <i class="fas fa-handshake"></i>
            <span>Layanan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Galeri
    </div>
    @if(Auth::user()->hasRole('superadmin'))
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('admin/posts*') ? 'active' : '' }}">
            <a class="nav-link " href="/admin/posts">
                <i class="fas fa-image"></i>
                <span>Galeri post</span>
            </a>
        </li>
    @endif
    <li class="nav-item {{ Request::is('admin/wisata*') ? 'active' : '' }}">
        <a class="nav-link " href="/admin/wisata">
            <i class="fas fa-book"></i>
            <span>Galeri wisata</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users
    </div>

    <li class="nav-item {{ Request::is('admin/pemohon*') ? 'active' : '' }}">
        <a class="nav-link " href="/admin/pemohon?pemohon=proses">
            <i class="fas fa-users"></i>
            <span>Pemohon</span>
        </a>
        {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-users"></i>
            <span>Pemohon</span>
        </a> --}}
        {{-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Peserta Pending</a>
                <a class="collapse-item" href="">Peserta Berlangsung</a>
                <a class="collapse-item" href="">Peserta Terlaksana</a>
                <a class="collapse-item" href="">Peserta Gagal</a>
            </div>
        </div> --}}
    </li>
    @if(Auth::user()->hasRole('superadmin'))
        <li class="nav-item {{ Request::is('admin/admin-setting*') ? 'active' : '' }}">
            <a class="nav-link " href="/admin/setadmin">
                <i class="fas fa-cog"></i>
                <span>Atur Admin</span>
            </a>
        </li>
    @endif



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
