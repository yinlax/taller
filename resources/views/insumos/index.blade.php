@extends('layouts.app')

@section('title', 'Lista de Insumos')

@section('content')

<main class="main-content" id="main-content">
    <div class="card">
        <h3>Lista de Insumos</h3>

        <div class="search-container">
            <a href="{{ route('insumos.create') }}" class="btn-create">Registrar Nuevo</a>
            <div class="search-wrapper">
                <label class="search-label" for="search">Buscar:</label>
                <input type="text" placeholder="Buscar insumo..." name="search" id="search">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insumos as $insumo)
                    <tr>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->cantidad }}</td>
                        <td>{{ $insumo->unidad }}</td>
                        <td>
                            @if ($insumo->imagen)
                                <img src="{{ asset('storage/' . $insumo->imagen) }}" alt="{{ $insumo->nombre }}" width="100">
                            @else
                                <span>No disponible</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('insumos.show', $insumo->id_insumo) }}" class="view">Ver</a>
                            <a href="{{ route('insumos.edit', $insumo->id_insumo) }}" class="edit">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
