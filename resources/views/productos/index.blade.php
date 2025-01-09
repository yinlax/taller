@extends('layouts.app') 

@section('title', 'Lista de Productos')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('content')

<main class="main-content" id="main-content">
    <div class="card">
        <h3>Lista de Productos</h3>

        <div class="search-container">
            <a href="{{ route('productos.create') }}" class="btn-create">Registrar Nuevo</a>
            <div class="search-wrapper">
                <label class="search-label" for="search">Buscar:</label>
                <input type="text" placeholder="Buscar producto..." name="search" id="search">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</td>
                        <td>
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="100">
                            @else
                                <span>No disponible</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('productos.show', $producto->id_producto) }}" class="view">Ver</a>
                            <a href="{{ route('productos.edit', $producto->id_producto) }}" class="edit">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</main>

@endsection
