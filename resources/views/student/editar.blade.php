<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiante - Sistema Educativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8e44ad;
            --secondary-color: #e91e63;
            --accent-color: #3498db;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        body {
            background-color: #f0f2f5;
            color: var(--dark-color);
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        .form-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }
        .form-body {
            padding: 40px;
        }
        .form-control, .form-select {
            border-radius: 20px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(142, 68, 173, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        .input-group-text {
            background-color: var(--light-color);
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 20px 0 0 20px;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 20px 20px 0;
        }
        footer {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Editar Estudiante</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <div class="form-header">
                        <h1 class="display-4">Editar Estudiante</h1>
                        <p class="lead">Completa el formulario para actualizar los datos del estudiante en el sistema</p>
                    </div>
                    <div class="form-body">
                        <form id="registroEstudiante" action="/student/{{$student->id}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{$student->lastname}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control" id="cedula" name="cedula" value="{{$student->cedula}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Edad</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                        <input type="number" class="form-control" id="age" name="age" min="5" max="100" value="{{$student->age}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Género</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Seleccione un género</option>
                                            <option value="Masculino" {{ $student->gender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Femenino" {{ $student->gender == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                            <option value="Otro" {{ $student->gender == 'Otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="grade" class="form-label">Grado</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <input type="text" class="form-control" id="grade" name="grade" value="{{$student->grade}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="n_subjects" class="form-label">Cantidad de Materias</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        <input type="number" class="form-control" id="n_subjects" name="n_subjects" min="1" max="20" value="{{$student->n_subjects}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="notes" class="form-label">Nota</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                        <input type="number" class="form-control" id="notes" name="notes" min="0" max="20" step="0.1" value="{{$student->notes}}" required>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-user-plus me-2"></i>Actualizar Estudiante
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Sistema Educativo. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>