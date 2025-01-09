@extends('layouts.app')

@section('title', 'Asignar Roles')

@section('content')
<main class="main-content" id="main-content">
    <div class="card">
        <h3>Asignar Rol a Usuario</h3>

        <form action="{{ route('usuarios.welcome') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="usuario">Seleccionar Usuario:</label>
                <select name="usuario_id" id="usuario" class="form-control">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="rol">Seleccionar Rol:</label>
                <select name="rol" id="rol" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Asignar Rol</button>
        </form>
    </div>
</main>
@endsection
