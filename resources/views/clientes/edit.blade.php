@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Editar Cliente</h3>
        <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
            </div>
            
            <div class="form-group">
                <label for="ci">C.I./ NIT</label>
                <input type="text" name="ci" id="ci" class="form-control" value="{{ $cliente->ci }}" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-create">Actualizar Cliente</button>
                <a href="{{ route('clientes.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
