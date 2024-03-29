@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Saída</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('pontos.saida.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="data_saida" class="col-md-4 col-form-label text-md-right">Data</label>

                            <div class="col-md-6">
                                <input id="data_saida" type="date" class="form-control" name="data_saida" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="hora_saida" class="col-md-4 col-form-label text-md-right">Hora de Saída</label>

                            <div class="col-md-6">
                                <input id="hora_saida" type="time" class="form-control" name="hora_saida" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Saída
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
