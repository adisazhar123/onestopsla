@extends('layouts.peminjam_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
    </style>
@endsection

@section('nav-barang')
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
            <li>Gunakan fitur search untuk mencari barang sesuai kata kunci, kategori dan tanggal.</li>
            <li>Pilih kata kunci, kategori atau tanggal yang lain jika tidak ada ketersediaan.</li>
        </ul>
        
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang yang tersedia</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ketersediaan untuk tanggal {{$start_date}} - {{$end_date}}</h6>
        </div>
        <div class="card-body">

            <form action="/peminjam" class="search-bar mb-3">
                <h3>Pencarian</h3>
                <div class="form-row">
                    <div class="col-md-4">
                        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-md-1">
                        <select class="form-control" name="category" id="">
                            <option value="" disabled selected>Kategori</option>
                            <option value="" selected>Semua</option>
                            <option value="Housing">Rumah</option>
                            <option value="Vehicle">Kendaraan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="start_date" value="{{$start_date}}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="end_date" value="{{$end_date}}">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <div class="items">
                <div class="row">
                    @if($items->isEmpty())
                        <div class="col-md-12">
                            <p>Barang tidak ditemukan.</p>
                        </div>
                    @endif

                    @foreach($items as $item)
                        <div class="col-sm-4 col-md-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5>{{$item->title}}</h5>
                                    <p>{{$item->description}}</p>
                                    <h6>
                                        <strong>Kategori:</strong>
                                        {{$item->category}}
                                    </h6>
                                    <h6>
                                        <strong>Jumlah yang tersedia:</strong>
                                        {{$item->quantity_available}}
                                    </h6>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-warning add-keranjang" item_id={{$item->id}}>
                                        Tambahkan ke keranjang peminjaman
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {!! $items->appends(request()->except('page'))->links() !!}
            </div>

        </div>
    </div>

@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function() {

            $(".add-keranjang").click(async function () {
               const itemId = $(this).attr('item_id');
               let response;

               try {
                   response = await $.ajax({
                      url: '{{url('peminjam/add-items-to-keranjang')}}',
                      data: {item: itemId}
                   });
               } catch (e) {
                   console.log(e);
                   alertify.success("Barang gagal ditambahkan ke keranjang! Mohon untuk refresh halaman.");
                   return false;
               }

               console.log(response);

               alertify.success("Barang berhasil ditambahkan ke keranjang!");

            });

        });
    </script>
@endsection
