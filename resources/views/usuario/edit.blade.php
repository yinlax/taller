<!-- resources/views/usuarios/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $usuario->nombre }}">
        <input type="email" name="email" value="{{ $usuario->email }}">
        <input type="password" name="password">
        <select name="estado">
            <option value="Activo" {{ $usuario->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Inactivo" {{ $usuario->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            <option value="Bloqueado" {{ $usuario->estado == 'Bloqueado' ? 'selected' : '' }}>Bloqueado</option>
        </select>
        
        <button type="submit">Actualizar</button>
    </form>
    
    <a href="{{ route('usuarios.index') }}">Volver a la lista</a>
</body>
</html>
