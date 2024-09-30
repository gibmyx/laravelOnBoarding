<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Educativo - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8e44ad;
            --secondary-color: #e91e63;
            --accent-color: #3498db;
        }
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #7d3c98;
            border-color: #7d3c98;
        }
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-outline-primary:hover, .btn-outline-primary:focus {
            background-color: var(--primary-color);
            color: white;
        }
        .hero-section {
            background: linear-gradient(rgba(142, 68, 173, 0.8), rgba(233, 30, 99, 0.8)), url('/placeholder.svg?height=400&width=1200');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .feature-icon {
            font-size: 3rem;
            color: var(--secondary-color);
        }
        .card {
            border-color: var(--primary-color);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .navbar-brand img {
            filter: brightness(0) invert(1);
        }
        .dropdown-menu {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        .dropdown-item {
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }
        .dropdown-item:hover, .dropdown-item:focus {
            background-color: var(--primary-color);
            color: white;
            transform: translateX(5px);
        }
        .dropdown-item i {
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }
        .dropdown-item:hover i {
            transform: scale(1.2);
        }
        .btn-hero {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            transform: scaleY(0);
            transform-origin: bottom center;
            transition: transform 0.3s;
            z-index: -1;
        }
        .btn-hero:hover::after {
            transform: scaleY(1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://api.iconify.design/mdi:school.svg?color=white" width="30" height="30" alt="Logo" class="d-inline-block align-top me-2">
                Sistema Educativo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section py-5 mb-5">
        <div class="container text-center py-5">
            <h1 class="display-4 fw-bold mb-3">Gestión Educativa Integral</h1>
            <p class="lead mb-4">Simplifica la administración de estudiantes y profesores con nuestro sistema CRUD.</p>
            <div class="d-flex justify-content-center gap-3">
                <div class="dropdown">
                    <button class="btn btn-light btn-lg dropdown-toggle btn-hero" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Registrar Persona
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="student/crear"><i class="fas fa-user-graduate"></i> Agregar Estudiante</a></li>
                        <li><a class="dropdown-item" href="professor/crear"><i class="fas fa-chalkboard-teacher"></i> Agregar Profesor</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-light btn-lg dropdown-toggle btn-hero" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        Ver Registros
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item" href="/student/listar"><i class="fas fa-list-alt"></i> Listar Estudiantes</a></li>
                        <li><a class="dropdown-item" href="/professor/listar"><i class="fas fa-list-alt"></i> Listar Profesores</a></li>
                        <li><a class="dropdown-item" href="/all/listar"><i class="fas fa-users"></i> Listar Todos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="container mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-user-plus feature-icon mb-3"></i>
                        <h3 class="card-title">Crear</h3>
                        <p class="card-text">Registra nuevos estudiantes y profesores de manera rápida y sencilla.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-search feature-icon mb-3"></i>
                        <h3 class="card-title">Leer</h3>
                        <p class="card-text">Accede a la información de todos los miembros de tu institución educativa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-edit feature-icon mb-3"></i>
                        <h3 class="card-title">Actualizar</h3>
                        <p class="card-text">Mantén los datos actualizados con nuestras herramientas de edición.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">¿Por qué elegirnos?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-graduation-cap text-primary me-3" style="font-size: 2rem;"></i>
                        <div>
                            <h4>Enfoque Educativo</h4>
                            <p>Diseñado específicamente para instituciones educativas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users text-primary me-3" style="font-size: 2rem;"></i>
                        <div>
                            <h4>Gestión Integral</h4>
                            <p>Administra estudiantes y profesores en un solo lugar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-lock text-primary me-3" style="font-size: 2rem;"></i>
                        <div>
                            <h4>Seguridad Garantizada</h4>
                            <p>Protegemos la información de tu institución.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2023 Sistema Educativo. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>