@extends('layouts.peminjam_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('nav-history-peminjaman')
    active
@endsection

@section('sidebar')
   @include("includes.peminjam-sidebar")
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History Peminjaman</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut adalah history peminjaman yang pernah anda ajukan</h6>
        </div>
        <div class="card-body">
            <div class="history-table">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lends as $lend)
                        <tr>
                            <td>{{$lend->name}}</td>
                            <td>{{$lend->nip}}</td>
                            <td>{{ date_format($lend->created_at, 'd/m/Y h:i A')}}</td>
                            <td>{{$lend->status}}</td>
                            <td>
                                <button class="btn btn-info info" lend-id={{$lend->id}}>Info</button>
                            </td>
                        </tr>
                    @endforeach
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

    <script>
{{--        TODO: history peminjaman datatable--}}
        $(document).ready(function () {
           const historyTable = $(".history-table table").DataTable({
               responsive: true
           });


        });
    </script>

@endsection
