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
        <div>
            <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman</h1> 
            <a href="../admin_peminjaman"><i class="fa fa-caret-left"></i> Kembali ke daftar peminjaman </a>    
        </div> 
        <button href="#" class="btn btn-danger btn-icon-split ml-1" disabled>
            <span class="text"> Status: Belum diterima</span>
        </button>             
    </div>
       
    <!-- Earnings (Monthly) Card Example -->
    

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
                        <tr>
                            <th>Jumlah Orang</th>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th>Tipe Penggunaan</th>
                            <td>Penggunaan</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai Pinjam</th>
                            <td>1 Juni 2019</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai Pinjam</th>
                            <td>10 Juni 2019</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6> Item yang Dipinjam: </h6>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th>No.</th>
                            <th>Nama Item</th>
                            <th>Jumlah</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Proyektor</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Proyektor</td>
                            <td>1</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#acceptModal">
                        <span class="text"><i class="fas fa-check"></i> Terima</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split ml-1" data-toggle="modal" data-target="#declineModal">
                        <span class="text"><i class="fas fa-times"></i> Tolak</span>
                    </a> 
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
