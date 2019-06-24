@extends('layouts.peminjam_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('nav-keranjang')
    active
@endsection

@section('sidebar')
   @include("includes.peminjam-sidebar")
@endsection

@section('content')
    <div class="alert alert-info">
        <h6>
            <strong>Panduan:</strong>
        </h6>
        <ul>
            <li>Isi form dibawah untuk mengajukan peminjaman.</li>
            <li>Cek barang yang ada di <a href="/peminjam/keranjang">keranjang</a>.</li>
        </ul>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajukan Peminjaman</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mohon mengisi form untuk mengajukan peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="form-peminjaman">
                <form action="{{url('peminjam/peminjaman')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Peminjam *</label>
                                <input type="text" name="name" id="" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">NIP *</label>
                                <input type="text" name="nip" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date_time">Tanggal Mulai Pinjam *</label>
                                <input id="start_date_time" class="form-control" type="date" name="start_date_time" required>

                                <label for="start_time">Jam Mulai Pinjam <small>(kosongkan bila tidak perlu. <strong>Wajib</strong> diisi jika meminjam ruangan</small></label>
                                <input type="time" name="start_time" class="form-control" id="start_time">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date_time">Tanggal Pengembalian Barang *</label>
                                <input type="date" id="end_date_time" name="end_date_time" class="form-control" required>

                                <label for="end_time">Jam Pengembalian Barang <small>(kosongkan bila tidak perlu. <strong>Wajib</strong> diisi jika meminjam ruangan</small></label>
                                <input type="time" name="end_time" class="form-control" id="end_time">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_type">Kategori Barang yang Dipinjam *</label>
                                <select name="item_type" id="item_type" class="form-control" required>
                                    <option value="Mix" selected>Campur/ Lain - lain</option>
                                    <option value="Vehicle">Kendaraan</option>
                                    <option value="Room">Ruangan</option>
                                    <option value="Housing">Rumah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usage_type">Diperlukan untuk kegiatan *</label>
                                <select name="usage_type" id=usage_type class="form-control">
                                    <option value="Extern" selected>Eksternal</option>
                                    <option value="Intern">Internal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Deskripsi Peminjaman</label>
                                <small>(Anda bisa menulis custom request disini.)</small>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="driver">Driver</label>
                                <input type="text" name="driver" id="driver" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="individuals_quantity">Jumlah Orang</label>
                                <input type="number" step="1" min="1" value="1" name="individuals_quantity" id="individuals_quantity" class="form-control">
                            </div>
                        </div>
                    </div>
    
                    <div class="div-form-row">
                        <div class="form-group" style="float: right;">
                            <button class="btn btn-success" type="submit">
                                Ajukan Peminjaman Sekarang
                            </button>
                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>


    <script>
        $(document).ready(function () {

            const hideTime = () => {
                $("#start_time").hide();
                $("#end_time").hide();

                $("label[for='start_time']").hide();
                $("label[for='end_time']").hide();
            };

            const showTime = () => {
                $("#start_time").show();
                $("#end_time").show();

                $("label[for='start_time']").show();
                $("label[for='end_time']").show();
            };

            const hideCar = () => {
                $("label[for='driver']").hide();
                $("#driver").hide();
            };

            const showCar = () => {
                $("label[for='driver']").show();
                $("#driver").show();
            };

            $("#item_type").change(function() {
               const value = $(this).val();
                console.log(value);
                switch (value) {
                    case 'Vehicle':
                        hideTime();
                        showCar();
                        break;
                    case 'Room':
                        showTime();
                        hideCar();
                        break;
                    case 'Housing':
                        hideTime();
                        hideCar();
                        break;
                    default:
                        showCar();
                        showTime();
                        break;
               }
            });



        });
    </script>
@endsection
