@extends('layouts.app')

@section('title', 'Lista de Clientes')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('content')
<main class="main-content" id="main-content">
    <div class="card">
        <h3>Lista de Clientes</h3>

        <div class="search-container">
            <a href="{{ route('clientes.create') }}" class="btn-create">Registrar Nuevo</a>
            <div class="search-wrapper">
                <label class="search-label" for="search">Buscar:</label>
                <input type="text" placeholder="Buscar cliente..." name="search" id="search">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>C.I. / NIT</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->ci }}</td>
                        <td class="actions">
                            <a href="{{ route('clientes.show', $cliente->id_cliente) }}" class="view">Ver</a>
                            <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="edit">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
