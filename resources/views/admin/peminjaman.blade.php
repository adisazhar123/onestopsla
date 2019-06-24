@extends('layouts.admin_dashboard')

@section('css.ext')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
        .item {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid #d1d3e2;
        }


    </style>

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
                        <th>Nama Pengaju</th>
                        <th>NIP Pengaju</th>
                        <th>Tipe Penggunaan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
        </div>
    </div>




    <div class="modal fade bd-example-modal-lg lend-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Info</h4>
                </div>
                <div class="modal-body">
                    <div class="item">
                        <div class="item-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consectetur culpa doloremque doloribus eum eveniet facere harum id illo in ipsam libero molestias nemo provident quidem, repellat, soluta? Consequuntur, laboriosam!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script.ext')

    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>

    {{--   Start Include JS Helpers  --}}
    <script src="{{asset('js/helpers/CategoriesHelper.js')}}"></script>
    <script src="{{asset('js/helpers/LendsStatusHelper.js')}}"></script>
    <script src="{{asset('js/helpers/UsageTypesHelper.js')}}"></script>
    {{-- End include JS Helpers --}}
    <script>
        $(document).ready(function () {


            $("#dataTable").DataTable({
               responsive: true,
               ajax: '{{url('/admin/peminjamans')}}',
               columns: [
                   {data: "name"},
                   {data: "nip"},
                   {data: "usage_type", render: function(data, type, row) {
                        return USAGE[data];
                       }
                   },
                   {data: "created_at", render: function(data, type, row) {
                        const date = moment(data).format("DD/MM/YYYY hh:mm A");
                        return date;
                       }
                   },
                   {data: "status", render: function(data, type, row) {
                            return STATUS[data];
                       }
                   },
                   {data: "id", render: function(data, type, row) {
                        return `<button class="btn btn-info info mr-1 mb-1" lend-id=${data}>Info</button><button class="btn btn-success accept mr-1 mb-1" lend-id=${data}>Terima</button><button class="btn btn-danger decline mr-1 mb-1" lend-id=${data}>Tolak</button>`;
                       }
                   }
               ]
            });

            $(document).on('click', '.info', async function () {
               const lendId = $(this).attr('lend-id');
               let res;

               try {
                res = await $.ajax({
                    url: '{{url('/admin/peminjamans')}}/' + lendId,

                });
               } catch (e) {
                   console.log(e);
                   return;
               }

               console.log(res);
                $(".lend-modal").modal('show');
            });

        });

    </script>

@endsection
