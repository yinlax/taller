@extends('layouts.app')

@section('title', 'Detalles del Insumo')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h1>Detalles del Insumo</h1>
        <p><strong>Nombre:</strong> {{ $insumo->nombre }}</p>
        <p><strong>Cantidad:</strong> {{ $insumo->cantidad }}</p>
        <p><strong>Unidad:</strong> {{ $insumo->unidad ?? 'No asignada' }}</p>
        
        @if($insumo->imagen)
            <p><strong>Imagen:</strong></p>
            <img src="{{ asset('storage/' . $insumo->imagen) }}" alt="{{ $insumo->nombre }}" width="150">
        @else
            <p><strong>Imagen:</strong> No disponible</p>
        @endif
        
        <a href="{{ route('insumos.index') }}" class="btn-back-only">Volver</a>
    </div>
</main>

@endsection
