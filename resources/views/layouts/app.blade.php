<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Ventas')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


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

        .header-title {
            text-decoration: none;
            margin-left: 40px;
            color: inherit;
        }

        #header h1 {
            font-size: 24px;
            margin: 0;
            padding: 0px;
            display: flex;
            align-items: center;
            cursor: pointer; 
        }

        #header h1 a {
            color: inherit;
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
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        .sidebar.collapsed h2 {
            opacity: 0;
            visibility: hidden;
        }

        .divider1 {
            border-top: 4px solid #34495e;
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

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar .submenu {
            margin-left: 25px;
            font-size: 0.9rem;
            display: none;
            flex-direction: column;
            margin-top: 8px;
            margin-bottom: 8px; 
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
            margin-left: 0px;
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
            margin-left: 0px;
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
        <h1>
            <button class="toggle-sidebar" onclick="toggleSidebar()">☰</button>
            <a href="{{ route('index') }}" class="header-title">
                Snack MacCholas - Sistema de Ventas
            </a>
            
        </h1>
        <nav>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </nav>
        
    </header>
    

    <div class="container">
        <aside class="sidebar" id="sidebar">
            <h2>Menú</h2>
            <div class="divider1"></div>
    
            <!-- Menú Usuarios -->
            <a href="#usuarios" onclick="toggleSubmenu(event)">
                <i class="fas fa-users"></i> Usuarios
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <div class="submenu" id="submenu-usuarios">
                <a href="{{ route('usuarios.index') }}">
                    <i class="fas fa-list"></i> Lista de Usuarios
                </a>
                <a href="#">
                    <i class="fas fa-user-plus"></i> Asignar Función
                </a>
            </div>
            <div class="divider"></div>
    
            <!-- Menú Productos -->
            <a href="{{ route('productos.index') }}">
                <i class="fas fa-hamburger"></i> Productos
            </a>
            <div class="divider"></div>
    
            <!-- Menú Insumos -->
            <a href="{{ route('insumos.index') }}">
                <i class="fas fa-utensils"></i> Insumos
            </a>
            <div class="divider"></div>
    
            <!-- Menú Clientes -->
            <a href="{{ route('clientes.index') }}">
                <i class="fas fa-users"></i> Clientes
            </a>
            <div class="divider"></div>
    
            <!-- Menú Pedidos -->
            <a href="#pedidos">
                <i class="fas fa-clipboard-list"></i> Pedidos
            </a>
            <div class="divider"></div>

            <!-- Confirmar Pedidos -->
            <a href="#confirmar-pedido">
                <i class="fas fa-check-circle"></i> Confirmar Pedido
            </a>
            <div class="divider"></div>
    
            <!-- Menú Facturación -->
            <a href="#facturacion">
                <i class="fas fa-file-invoice"></i> Facturación
            </a>
            <div class="divider"></div>

            <!-- Reportes -->
            <a href="{{ route('reportes.index') }}">
                <i class="fas fa-chart-line"></i> Reportes
            </a>
            <div class="divider"></div>
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
