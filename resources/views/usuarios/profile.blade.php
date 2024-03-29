@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">Name:</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control" value="{{ $user->nome }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF:</label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control" value="{{ $user->cpf }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="funcao" class="col-md-4 col-form-label text-md-right">Função:</label>

                        <div class="col-md-6">
                            <input id="funcao" type="text" class="form-control" value="{{ $user->funcao }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="turno" class="col-md-4 col-form-label text-md-right">Turno:</label>

                        <div class="col-md-6">
                            <input id="turno" type="text" class="form-control" value="{{ $user->turno }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
