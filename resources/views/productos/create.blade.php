@extends('layouts.app')  

@section('title', 'Registrar Producto')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Registrar Producto</h3>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_categoria">Categoría</label>
                <select name="id_categoria" id="id_categoria" class="form-control" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Guardar</button>
                <a href="{{ route('productos.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
