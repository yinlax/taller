@extends('layouts.app')

@section('title', 'Lista de Usuarios')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@section('content')

<main class="main-content" id="main-content">
    <div class="card">
        <h3>Lista de Usuarios</h3>

        <div class="search-container">
            <a href="{{ route('usuarios.create') }}" class="btn-create">Registrar Nuevo</a>
            <div class="search-wrapper">
                <label class="search-label" for="search">Buscar:</label>
                <input type="text" placeholder="Buscar usuario..." name="search" id="search">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->estado }}</td>
                        <td class="actions">
                            <a href="{{ route('usuarios.show', $usuario->id_usuario) }}" class="view">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="edit">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
