@extends('layouts.master')
@section('titulo', 'Admin')
@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('dataTables/datatables.css') }}">
@endsection
@section('content')
    <div class="m-min">
        <div class="container-fluid m-auto">
            <div class="row">
                <div class="col-auto offset-1">
                    <div class="card bg-dark w-auto">
                        <div class="btn-group-vertical text-white p-3">
                            <button id="btn-client" type="button" class="btn btn-outline-primary text-white mb-2"
                                onclick="selectClients()">Clientes</button>
                            <button id="btn-employee" type="button" class="btn btn-outline-primary text-white mb-2"
                                onclick="selectEmployees()">Empleados</button>
                            <div class="dropdown">
                                <button id="btn-querys" type="button" class="btn btn-dropdown text-white dropdown-toggle"
                                    data-toggle="dropdown">
                                    Consultas
                                </button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item btn btn-item"
                                        onclick="selectQuerys('birthday')" data-toggle="tooltip" data-placement="right"
                                        title="Clientes que cumplen años este mes y que han gastado mas de 200€">Cumpleaños
                                        este mes</button>
                                    <button type="button" class="dropdown-item btn btn-item"
                                        onclick="selectQuerys('creditcard')" data-toggle="tooltip" data-placement="right"
                                        title="Clientes con reservas pagadas con tarjeta de credito por valor superior a 100€">Tarjeta
                                        superior a 100</button>
                                    <button type="button" class="dropdown-item btn btn-item"
                                        onclick="selectQuerys('aged')" data-toggle="tooltip" data-placement="right"
                                        title="Datos del cliente mas mayor que haya realizado alguna reserva">Cliente mas
                                        mayor</button>
                                        <button type="button" class="dropdown-item btn btn-item"
                                        onclick="selectQuerys('room')" data-toggle="tooltip" data-placement="right"
                                        title="Datos de la sala con mayor beneficio">Sala mas lucrativa</button>
                                        <button type="button" class="dropdown-item btn btn-item"
                                        onclick="selectQuerys('reserve')" data-toggle="tooltip" data-placement="right"
                                        title="Datos de las reservas del todo el año">Lista de resevas anual</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mr-5">
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
    <script src="{{ asset('js/session.js') }}"></script>
    <script src="{{ asset('dataTables/datatables.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

    <script type="text/javascript">
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
