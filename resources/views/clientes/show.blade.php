@extends('layouts.app')

@section('title', 'Detalles del Cliente')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h1>Detalles del Cliente</h1>
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>C.I.:</strong> {{ $cliente->ci }}</p>
        <a href="{{ route('clientes.index') }}" class="btn-back-only">Volver</a>
    </div>
</main>

@endsection
