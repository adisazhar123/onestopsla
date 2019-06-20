@extends('layouts.admin_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('sidebar')
  @include('includes.sidebar')
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Peminjaman</h1>        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Permintaan Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Pengajuan</th>
                        <th>Nama Pengaju</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th style="width: 25%">Pilihan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>No. Pengajuan</th>
                        <th>Nama Pengaju</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Pilihan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>11111</td>
                        <td>Nama Pengaju 1</td>
                        <td>1 Juni 2019</td>
                        <td>Belum diterima</td>
                        <td class="text-center">
                            <a href="../admin_detail_peminjaman" class="btn btn-primary btn-icon-split">
                                <span class="text"> <i class="fas fa-search"></i> Lihat Detail</span>
                            </a>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="text"><i class="fas fa-check"></i> Terima</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="text"><i class="fas fa-times"></i> Tolak</span>
                            </a>                 
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>11112</td>
                        <td>Nama Pengaju 2</td>
                        <td>1 Juni 2019</td>
                        <td>Belum diterima</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-icon-split">
                                <span class="text"> <i class="fas fa-search"></i> Lihat Detail</span>
                            </a>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="text"><i class="fas fa-check"></i> Terima</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="text"><i class="fas fa-times"></i> Tolak</span>
                            </a>                    
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
