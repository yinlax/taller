@extends('layouts.app')

@section('title', 'Registrar Cliente')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Registrar Cliente</h3>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ci">C.I.</label>
                <input type="text" name="ci" id="ci" class="form-control" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Guardar</button>
                <a href="{{ route('clientes.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
