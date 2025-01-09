@extends('layouts.app')  

@section('title', 'Registrar Insumo')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Registrar Insumo</h3>
        <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="unidad">Unidad</label>
                <input type="text" name="unidad" id="unidad" class="form-control">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Guardar</button>
                <a href="{{ route('insumos.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
