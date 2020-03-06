@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    Gerencimando de Ordem de Serviço
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('create') }}" title="Abrir OS"><i class="far fa-plus-square fa-2x"></i></a>
                            <a href="{{ route('regist') }}" title="Registrar OS" class="col-2"><i class="fas fa-list-ul fa-2x"></i></a>
                            @if(Auth::user()->roles->first()->name === 'Admin')
                            <a href="{{ route('register') }}" title="Novo Usuário"><i class="fas fa-user-plus fa-2x"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    Lista de OS
                </div>
                <div class="card-body table-responsive align-middle">
                    <!-- <div class="search">
                        <form action="{{ route('home') }}" method="get" class="container-fluid">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Pesquise por departamento. Ex: ADM" name="search" value="{{ isset($search) ? $search : '' }}">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="os_lists">
                        <table id="table_os" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">Solicitante</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $order)
                                <tr>
                                    <td class="align-middle">{{ $order->requester }}</td>
                                    <td class="align-middle">{{ $order->department }}</td>
                                    <td class="align-middle">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="align-middle">{{ $order->reason }}</td>
                                    <td class="align-middle">{{ $order->status_service }}</td>
                                    <td class="align-middle">
                                        @if((Auth::user()->roles->first()->name === 'Admin') xor (Auth::user()->roles->first()->name ==='Techinician'))
                                        <a class="btn btn-sm btn-warning " href="{{route('form', $order->id)}}" title="Editar OS"><i class="fas fa-pen fa-fw text-black"></i></a>
                                        @endif
                                        @if((Auth::user()->roles->first()->name === 'Admin') or (Auth::user()->roles->first()->name === 'Atendee') or (Auth::user()->roles->first()->name === 'Techinician'))
                                        <a class="btn btn-sm btn-info " href="{{route('view', $order->id)}}" title="Ver OS"><i class="fas fa-eye fa-fw text-black"></i></a>
                                        @endif
                                        @if(Auth::user()->roles->first()->name === 'Admin')
                                        <a class="btn btn-sm btn-danger delete" href="{{route('destroy', $order->id)}}" title="Deletar OS"><i class="fas fa-times fa-fw text-black"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection