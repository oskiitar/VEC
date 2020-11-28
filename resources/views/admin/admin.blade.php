@extends('layouts.master')
@section('titulo', 'Admin')
@section('head')
    <link rel="stylesheet" href="alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="dataTables/datatables.css">
@endsection
@section('content')
    <div class="m-min">
        <div class="container-xl">
            <div class="row">
                <div class="col-0 offset-1">
                    <div class="card bg-dark">
                        <div class="btn-group-vertical text-white p-3">
                            <button type="button" class="btn btn-light active mb-2"
                                onclick="selectClients()">Clientes</button>
                            <button type="button" class="btn btn-light mb-2" onclick="selectEmployees()">Empleados</button>
                            <button type="button" class="btn btn-light mb-2">Reservas</button>
                        </div>
                    </div>
                </div>
                <div class="col-8 offset-1">
                    <div id="loading" class="d-flex justify-content-center"></div>
                    <table id="tabla" class="table table-striped table-condensed align-content-center small"></table>
                </div>
            </div>

            @include('admin.modalNuevo')

            @include('admin.modalEdicion')

        </div>
    </div>
@endsection

@section('footer')
@endsection

@section('script')
    <script src="{{ asset('js/adminFunciones.js') }}"></script>
    <script src="{{ asset('alertify/alertify.js') }}"></script>
    <script src="{{ asset('dataTables/datatables.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // recibe una callback de la llamada ajax
        $(document).ready(function() {
            selectClients();
        });

        function selectClients() {
            loadData('client', htmlData);
        }

        function selectEmployees() {
            loadData('employee', htmlData);
        }

        function selectReservations() {
            loadData('reservation', htmlData);
        }

        function htmlData(data) {
            if ($.fn.dataTable.isDataTable('#tabla')) {
                $('#tabla').DataTable().destroy();
            }

            $('#tabla').empty();
            $('#loading').append('<div class="spinner-border mt-5" role="status">');

            setTimeout(function() {                
                $('#tabla').html(data).DataTable({
                    order: [0, "asc"],
                    lengthMenu: [
                        [5, 15, 25, -1],
                        [5, 15, 25, "All"]
                    ],
                    language: {
                        "url": "{{ asset('dataTables/datatables.spa.json') }}"
                    }
                });
                $('#loading').empty();
            }, 500);            
        }

    </script>
@endsection
