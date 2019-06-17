@extends('layouts.admin_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('sidebar')
    <title>Admin | Detail Peminjaman</title>
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
    <!-- Heading -->
    <li class="nav-item">
        <a class="nav-link" href="../admin_peminjaman">
        <i class="fas fa-fw fa-table"></i>
        <span>Manage Peminjaman</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="../admin_complaints">
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Detail Complaint</h1> 
            <a href="../admin_complaints"><i class="fa fa-caret-left"></i> Kembali ke daftar complaint </a>    
        </div>           
    </div>
       
    <!-- Earnings (Monthly) Card Example -->
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <style>
                            th{
                                width: 30%;
                            }
                        </style> 
                        <tr>
                            <th>Nomor Complaint</th>
                            <td>11111</td>
                        </tr>
                        <tr>
                            <th>Nama Pengaju</th>
                            <td>Nama Pengaju 1</td>
                        </tr>
                        <tr>
                            <th>Tanggal Complaint</th>
                            <td>1 Juni 2019</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>Subject</td>
                        </tr>
                        <tr>
                            <th>Jumlah Orang</th>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>Deskripsi complaint</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--modal terima-->
    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menerima permintaan peminjaman ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="login.html">Terima</a>
                </div>
            </div>
        </div>
    </div>
    <!--modal tolak-->
    <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menolak permintaan peminjaman ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Jika permintaan ditolak, silahkan masukkan alasan penolakan:</label>
                        <input type="text" class="form-control" id="alasan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="login.html">Tolak</a>
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