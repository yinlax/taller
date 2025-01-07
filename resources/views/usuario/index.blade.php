@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

<style>
    .card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        width: 100%;
    }

    .btn-create {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 20px;
        transition: background-color 0.3s;
    }

    .btn-create:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    table tr:hover {
        background-color: #f9f9f9;
    }

    .actions a {
        margin-right: 10px;
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }

    .actions a:hover {
        color: #0056b3;
    }

    .actions a:active {
        color: #003d7a;
    }
</style>

<main class="main-content" id="main-content">
    <div class="card">
        <h3>Lista de Usuarios</h3>

        <a href="{{ route('usuarios.create') }}" class="btn-create">Crear Usuario</a>

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
                            <a href="{{ route('usuarios.show', $usuario->id_usuario) }}">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
