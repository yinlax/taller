<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Snack MacCholas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('images/login.jpg') no-repeat center center/cover; 
            position: relative;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); 
            z-index: -1;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .login-container h2 {
            font-size: 24px;
            color: #555;
            margin-bottom: 30px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container button {
            background-color: #1e4977;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>
    <div class="login-container">
        <h1>Snack MacCholas</h1>
        <h2>Iniciar Sesión</h2>
        <form action="{{ route('login') }}" method="POST">
            <!-- Campo de usuario -->
            @csrf
            <input type="text" name="email" placeholder="Nombre de usuario" required>

            <!-- Campo de contraseña -->
            <input type="password" name="password" id="password" placeholder="Contraseña" required>

            <!-- Botón de login -->
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
