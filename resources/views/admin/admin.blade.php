@extends('layouts.master')
@section('titulo', 'Admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('alertify/css/alertify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dataTables/datatables.css') }}">
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

            @include('admin.modal.addClient')
            @include('admin.modal.addEmployee')
            @include('admin.modal.editClient')
            @include('admin.modal.editEmployee')

        </div>
    </div>
@endsection

@section('footer')
@endsection

@section('script')
    <script src="{{ asset('dataTables/datatables.js') }}"></script>
    <script src="{{ asset('alertify/alertify.js') }}"></script>
    <script src="{{ asset('js/adminAjax.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

    <script type="text/javascript">
        // Carga del token de session en cabecera AJAX

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            selectClients();
        });

        /* LLamadas AJAX con callback de funcion que carga los modelos
           en tablas */

        function selectClients() {
            loadData('client', htmlData);
        }

        function selectEmployees() {
            loadData('employee', htmlData);
        }

        function selectReservations() {
            loadData('reservation', htmlData);
        }

        // Tabla dinamica plugin Datatables

        function htmlData(data) {
            if ($.fn.dataTable.isDataTable('#tabla')) {
                // Si existe la tabla debe destruirse para poder crear una nueva
                $('#tabla').DataTable().destroy();
            }

            // Vacia el elemento tabla
            $('#tabla').empty();
            // Carga el spinner hasta que la tabla se muestre
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
            }, 500); // Tiempo en aparecer la tabla            
        }

    </script>
@endsection
