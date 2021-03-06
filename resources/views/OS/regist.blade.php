@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>Registrar uma OS antiga</h5>
                <br>
                <form method="post" action="{{ route('registering') }}">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="requester">Solicitante</label>
                            <input class="form-control" type="text" name="requester" id="requester">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department">Departamento</label>
                            <select name="department" id="department" class="form-control">
                                <option value="" selected disabled>Selecione</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department }}">{{ $department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="date">Data</label>
                            <input class="form-control" type="datetime-local" name="date" id="date">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="contact">Contato</label>
                            <input class="form-control" type="text" name="contact" id="contact">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="reason">Motivo do Chamado</label>
                            <input class="form-control" type="text" name="reason" id="reason">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="soluction">Solução</label>
                            <input class="form-control" type="text" name="soluction" id="soluction">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="technician">Técnico</label>
                            <input class="form-control" type="text" name="technician" id="technician">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_resolution">Data da Solução</label>
                            <input class="form-control" type="datetime-local" name="date_resolution" id="date_resolution">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status_service">Status</label>
                            <select class="form-control" name="status_service" id="status_service">
                                <option value="1">Aberta</option>
                                <option value="2">Em Analise</option>
                                <option value="3">Concluída</option>
                                <option value="4">Atendimento Local</option>
                                <option value="5">Atendimento Remoto</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="offset-md-8 col-md-2 mb-1">
                            <button class="form-control btn btn-primary" type="submit">Registrar OS</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('home')}}" class="form-control btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection