<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Ventas')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: margin-left 0.3s;
            margin-left: 250px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        header.collapsed {
            margin-left: 60px;
        }

        header h1 {
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header nav {
            display: flex;
            gap: 15px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ffdd59;
        }

        .container {
            display: flex;
            flex: 1;
            margin-top: 60px;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            transition: width 0.3s;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .sidebar.collapsed a {
            display: none;
        }

        .sidebar.collapsed .submenu {
            display: none;
        }

        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .sidebar.collapsed h2 {
            opacity: 0;
            visibility: hidden;
        }

        .divider1 {
            border-top: 3px solid #34495e;
            margin: 10px 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar .submenu {
            margin-left: 15px;
            font-size: 0.9rem;
            display: none;
            flex-direction: column;
        }

        .sidebar .submenu a {
            padding: 5px;
        }

        .sidebar .submenu.active {
            display: flex;
        }

        .divider {
            border-top: 1px solid #34495e;
            margin: 5px 0;
        }

        .toggle-sidebar {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
            margin-left: 120px;
            transition: margin-left 0.3s;
        }

        .main-content.collapsed {
            margin-left: 60px;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px 20px;
            transition: margin-left 0.3s;
            margin-left: 250px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        footer.collapsed {
            margin-left: 60px;
        }

        footer p {
            font-size: 0.9rem;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            margin-bottom: 15px;
        }

        .card p {
            color: #7f8c8d;
        }

        .btn-logout {
            background-color: #ad3325;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .btn-logout:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.5);
        }
    </style>
</head>

<body>
    <header id="header">
        <h1><button class="toggle-sidebar" onclick="toggleSidebar()">☰</button>Snack MacCholas - Sistema de Ventas</h1>
        <nav>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Cerrar sesión</button>
            </form>
        </nav>
    </header>

    <div class="container">
        <aside class="sidebar" id="sidebar">
            <h2>Menú</h2>
            <div class="divider1"></div>
            <a href="#roles">Roles</a>
            <div class="divider"></div>
            <a href="#usuarios" onclick="toggleSubmenu(event)">Usuarios</a>
            <div class="submenu" id="submenu-usuarios">
                <a href="{{ route('usuarios.index') }}">Lista de Usuarios</a>
                <a href="#asignar-funcion">Asignar Función</a>
            </div>
            <div class="divider"></div>
            <a href="#productos">Productos</a>
            <div class="divider"></div>
            <a href="#insumos">Insumos</a>
            <div class="divider"></div>
            <a href="#clientes">Clientes</a>
            <div class="divider"></div>
            <a href="#pedidos">Pedidos</a>
            <a href="#confirmar-pedido">Confirmar Pedido</a>
            <div class="divider"></div>
            <a href="#facturacion">Facturación</a>
        </aside>

        <main class="main-content" id="main-content">
            @yield('content') 
        </main>
    </div>

    <footer id="footer">
        <p>&copy; 2025 Snack MacCholas. Todos los derechos reservados. | Contacto: info@snackmaccholas.com</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const header = document.getElementById('header');
            const footer = document.getElementById('footer');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('collapsed');
            header.classList.toggle('collapsed');
            footer.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
        }

        function toggleSubmenu(event) {
            event.preventDefault();
            const submenu = document.getElementById('submenu-usuarios');
            submenu.classList.toggle('active');
        }
    </script>
</body>

</html>
