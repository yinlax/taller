@extends('layouts.app')

@section('title', 'Editar Insumo')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Editar Insumo</h3>
        <form action="{{ route('insumos.update', $insumo->id_insumo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $insumo->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $insumo->cantidad }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="unidad">Unidad</label>
                <input type="text" name="unidad" id="unidad" class="form-control" value="{{ $insumo->unidad }}">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @if($insumo->imagen)
                    <img src="{{ asset('storage/' . $insumo->imagen) }}" alt="Imagen del insumo" width="100">
                @endif
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Actualizar</button>
                <a href="{{ route('insumos.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
