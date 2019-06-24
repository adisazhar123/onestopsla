<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/peminjam">
    <div class="sidebar-brand-icon ml-0 mr-0 " style="width:100%">
        <img src={{asset('img/logoBI2.png')}} style="width: 30%" alt="logo">
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">


<!-- Heading -->
<li class="nav-item @yield('nav-barang')">
    <a class="nav-link" href="/peminjam">
        <i class="fas fa-fw fa-table"></i>
        <span>Cek Ketersediaan Barang</span>
    </a>
</li>

<li class="nav-item @yield('nav-keranjang')">
    <a class="nav-link" href="/peminjam/keranjang">
        <i class="fas fa-fw fa-table"></i>
        <span>Keranjang Peminjaman</span>
    </a>
</li>

<li class="nav-item @yield('nav-history-peminjaman')">
    <a class="nav-link" href="/peminjam/history-peminjaman">
        <i class="fas fa-fw fa-table"></i>
        <span>History Peminjaman</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
