@extends('layouts.master')
@section('titulo', 'Admin')
@section('content')
    <div class="m-default">
        <div class="container-xl">
            <div class="row">
                <div class="col-0 offset-1">
                    <div class="card bg-dark">
                        <div class="btn-group-vertical text-white p-3">
                            <button type="button" class="btn btn-light active mb-2" onclick="selectClients()">Clientes</button>
                            <button type="button" class="btn btn-light mb-2" onclick="selectEmployees()">Empleados</button>
                            <button type="button" class="btn btn-light mb-2">Reservas</button>
                        </div>
                    </div>
                </div>
                <div class="col-8 offset-1">
                    <div id="tabla"></div>
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
            $('#tabla').html(data);
        }

    </script>
@endsection
