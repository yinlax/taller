@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h1>Detalles del Usuario</h1>
        <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Estado:</strong> {{ $usuario->estado }}</p>
        <a href="{{ route('usuarios.index') }}" class="btn-back-only">Volver</a>
    </div>
</main>

@endsection
