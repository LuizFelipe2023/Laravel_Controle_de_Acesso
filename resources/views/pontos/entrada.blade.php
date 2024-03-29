@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Entrada</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('pontos.entrada.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="data_entrada" class="col-md-4 col-form-label text-md-right">Data</label>

                            <div class="col-md-6">
                                <input id="data_entrada" type="date" class="form-control" name="data_entrada" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="hora_entrada" class="col-md-4 col-form-label text-md-right">Hora de Entrada</label>

                            <div class="col-md-6">
                                <input id="hora_entrada" type="time" class="form-control" name="hora_entrada" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Entrada
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
