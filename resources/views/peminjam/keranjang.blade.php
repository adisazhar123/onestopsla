@inject('categoriesHelper', 'OneStopSla\Core\Domain\Helpers\CategoriesHelper')

@extends("layouts.peminjam_dashboard")

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
        .item-keranjang {
            padding: 20px;
            border-top: none;
            border-left: none;
            border-right: none;
        }
    </style>
@endsection

@section('nav-keranjang')
    active
@endsection

@section('sidebar')
    @include("includes.peminjam-sidebar")
@endsection




@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>
                {{Session::get('success')}}
            </p>
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Keranjang Peminjaman</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Barang yang terdapat pada keranjang peminjamaan</h6>
        </div>
        <div class="card-body">
            @if($keranjang->isEmpty())
                <p>Tidak ada barang di keranjang.</p>
            @else
                @foreach($keranjang->groupItemsById() as $item)
                    <div class="card item-keranjang">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><strong>{{$item->title}}</strong></h4>
                                <p>{{$item->description}}</p>
                            </div>
                            <div class="col-md-2">
                                <h4>
                                    <strong>
                                        {{$item->quantity}}
                                    </strong>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <h4>
                                    <strong>
                                        {{$categoriesHelper::toIndonesian($item->category)}}
                                    </strong>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"> </i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif

        </div>

        <div class="card-footer">

            <form action="/peminjam/keranjang" method="POST">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <div class="form-row">
                    <div class="col-md-10">
                        <button class="btn btn-danger reset" @if($keranjang->isEmpty()) {{"disabled"}} @endif type="submit">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Reset keranjang
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a @if(!$keranjang->isEmpty()) {{'href="/peminjam/peminjaman"'}} @else href="#" @endif class="btn btn-success lanjutkan" style="float: right">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            Lanjutkan peminjaman
                        </a>
                    </div>
                </div>
            </form>


        </div>

    </div>
@endsection


@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
