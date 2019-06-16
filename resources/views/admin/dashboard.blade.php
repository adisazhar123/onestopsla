@extends('layouts.admin_dashboard')

@section('sidebar')
    <title>Admin | Dashboard</title>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ml-0 mr-0 " style="width:100%">
            <img src="{{asset('img/logoBI2.png')}}" style="width: 30%">                
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="nav-item">
        <a class="nav-link" href="../admin_peminjaman">
        <i class="fas fa-fw fa-table"></i>
        <span>Manage Peminjaman</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Manage Complaints</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-warehouse"></i>
        <span>Manage Barang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage User</span></a>
    </li> 

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection

@section('content')
    
@endsection