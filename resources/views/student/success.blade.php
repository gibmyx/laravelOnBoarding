<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso - Sistema Educativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8e44ad;
            --secondary-color: #e91e63;
            --accent-color: #3498db;
        }
        body {
            background-color: #f0e6f6;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        .success-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(142, 68, 173, 0.2);
            padding: 30px;
            margin-top: 50px;
            text-align: center;
        }
        .success-icon {
            font-size: 5rem;
            color: #2ecc71;
            margin-bottom: 20px;
        }
        .success-title {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(233, 30, 99, 0.3);
        }
        footer {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>
                Sistema Educativo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/student/listar">Registro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 success-container">
                <i class="fas fa-check-circle success-icon"></i>
                <h2 class="success-title">¡Registro Exitoso!</h2>
                <p class="mb-4">El estudiante ha sido registrado correctamente en nuestro sistema.</p>
                <a href="/student/listar" class="btn btn-custom">Mostrar Registros</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Sistema Educativo. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>