@extends('layouts.app')

@section('title', 'Crear Usuario')

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
    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-create {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 15px;
        transition: background-color 0.3s;
    }

    .btn-create:hover {
        background-color: #45a049;
    }

    .btn-back {
        display: inline-block;
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 10px;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }
</style>
    <div class="card">
        <h3>Crear Usuario</h3>
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
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-create">Guardar</button>
        </form>
        <a href="{{ route('usuarios.index') }}" class="btn-back">Volver a la lista</a>
    </div>
@endsection


