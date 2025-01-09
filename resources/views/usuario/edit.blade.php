@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Editar Usuario</h3>
        <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Activo" {{ $usuario->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $usuario->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    <option value="Bloqueado" {{ $usuario->estado == 'Bloqueado' ? 'selected' : '' }}>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Actualizar</button>
                <a href="{{ route('usuarios.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
