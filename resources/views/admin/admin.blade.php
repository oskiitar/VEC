@extends('layouts.master')
@section('titulo', 'Admin')
@section('content')
    <div class="m-default">
        <div class="container-xl">
            <div class="row">
                <div class="col-0 offset-1">
                    <div class="card bg-dark">
                        <div class="btn-group-vertical text-white p-3">
                            <button type="button" class="btn btn-light active mb-2">Clientes</button>
                            <button type="button" class="btn btn-light active mb-2">Empleados</button>
                            <button type="button" class="btn btn-light active mb-2">Reservas</button>
                          </div>
                    </div>
                </div>
                <div class="col-8 offset-1">
                    <table class="table table-hover table-condensed align-content-center small">
                        <caption>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                Nuevo<i class="fas fa-address-book ml-2"></i>
                            </button>
                        </caption>
                        <tr class="bg-dark text-white">
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Surname') }}</th>
                            <th>{{ __('Birthday') }}</th>
                            <th>{{ __('Tel') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @if (is_array($clients) || is_object($clients))
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->user->name }}</td>
                                    <td>{{ $client->user->surname }}</td>
                                    <td>{{ $client->user->birthday }}</td>
                                    <td>{{ $client->user->tel }}</td>
                                    <td>{{ $client->user->email }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#modalEdicion" onclick="">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="">
                                            <i class="fas fa-user-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>

            @include('admin.modalNuevo')

            @include('admin.modalEdicion')

        </div>
    </div>
@endsection
