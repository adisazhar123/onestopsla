@extends('layouts.admin_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('sidebar')
    <title>Admin | Peminjaman</title>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ml-0 mr-0 " style="width:100%">
            <img src="{{asset('img/logoBI2.png')}}" style="width: 30%">                
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="admin_dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="nav-item active">
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
    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman</h1> 
    <a href="../admin_peminjaman"><i class="fa fa-caret-left"></i> Kembali ke daftar peminjaman </a>       
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th>Nomor Pengajuan</th>
                            <td>11111</td>
                        </tr>
                        <tr>
                            <th>Nama Pengaju</th>
                            <td>Nama Pengaju 1</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>1 Juni 2019</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>Deskripsi</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection