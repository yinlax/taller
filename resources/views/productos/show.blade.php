@extends('layouts.app')

@section('title', 'Detalles del Producto')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h1>Detalles del Producto</h1>
        <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
        <p><strong>Estado:</strong> {{ $producto->estado }}</p>
        <p><strong>Categoría:</strong> {{ $producto->categoria ? $producto->categoria->nombre : 'No asignada' }}</p>
        
        @if($producto->imagen)
            <p><strong>Imagen:</strong></p>
            <img src="{{ $producto->getImagenUrlAttribute() }}" alt="{{ $producto->nombre }}" width="150">
        @else
            <p><strong>Imagen:</strong> No disponible</p>
        @endif
        
        <a href="{{ route('productos.index') }}" class="btn-back-only">Volver</a>
    </div>
</main>

@endsection
