<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuario</title>
</head>
<body>
    <h1>Detalles del Usuario</h1>
    <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>
    <a href="{{ route('usuarios.index') }}">Volver a la lista</a>
</body>
</html>
