@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Editar Producto</h3>
        <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $producto->descripcion }}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Activo" {{ $producto->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $producto->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_categoria">Categoría</label>
                <select name="id_categoria" id="id_categoria" class="form-control">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" 
                            {{ $producto->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @if($producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" width="100">
                @endif
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection

