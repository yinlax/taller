@extends('layouts.app') 

@section('title', 'Crear Usuario')

@section('content')

<main class="main-content" id="main-content">
    <div class="card_center">
        <h3>Registrar Usuario</h3>
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" id="rol" class="form-control" required>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id_rol }}">{{ $rol->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn-create">Guardar</button>
                <a href="{{ route('usuarios.index') }}" class="btn-back">Cancelar</a>
            </div>
        </form>
    </div>
</main>

@endsection
