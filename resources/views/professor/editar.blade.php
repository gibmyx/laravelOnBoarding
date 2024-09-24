<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Profesor - Sistema Educativo</title>
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
        .input-group .form-control, .input-group .form-select {
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
                        <a class="nav-link active" aria-current="page" href="#">Editar Profesor</a>
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
                        <h1 class="display-4">Editar Profesor</h1>
                        <p class="lead">Completa el formulario para actualizar los datos del profesor en el sistema</p>
                    </div>
                    <div class="form-body">
                        <form id="registroProfesor" action="/professor/{{$professor->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$professor->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{$professor->lastname }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control" id="cedula" name="cedula" value="{{$professor->cedula }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Edad</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                        <input type="number" class="form-control" id="age" name="age" min="18" max="100" value="{{$professor->age }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Género</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Seleccione un género</option>
                                            <option value="Masculino" {{ $professor->gender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Femenino" {{ $professor->gender == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                            <option value="Otro" {{ $professor->gender == 'Otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="u_degrees" class="form-label">Título Universitario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <select class="form-select" id="u_degrees" name="u_degrees" required>
                                            <option value="">Seleccione un título</option>
                                            <option value="Licenciatura en Educación" {{ $professor->u_degrees == 'Licenciatura en Educación' ? 'selected' : '' }}>Licenciatura en Educación</option>
                                            <option value="Licenciatura en Matemáticas" {{ $professor->u_degrees == 'Licenciatura en Matemáticas' ? 'selected' : '' }}>Licenciatura en Matemáticas</option>
                                            <option value="Licenciatura en Literatura" {{ $professor->u_degrees == 'Licenciatura en Literatura' ? 'selected' : '' }}>Licenciatura en Literatura</option>
                                            <option value="Licenciatura en Historia" {{ $professor->u_degrees == 'Licenciatura en Historia' ? 'selected' : '' }}>Licenciatura en Historia</option>
                                            <option value="Licenciatura en Biología" {{ $professor->u_degrees == 'Licenciatura en Biología' ? 'selected' : '' }}>Licenciatura en Biología</option>
                                            <option value="Licenciatura en Química" {{ $professor->u_degrees == 'Licenciatura en Química' ? 'selected' : '' }}>Licenciatura en Química</option>
                                            <option value="Licenciatura en Física" {{ $professor->u_degrees == 'Licenciatura en Física' ? 'selected' : '' }}>Licenciatura en Física</option>
                                            <option value="Licenciatura en Idiomas" {{ $professor->u_degrees == 'Licenciatura en Idiomas' ? 'selected' : '' }}>Licenciatura en Idiomas</option>
                                            <option value="Ingeniería en Sistemas" {{ $professor->u_degrees == 'Ingeniería en Sistemas' ? 'selected' : '' }}>Ingeniería en Sistemas</option>
                                            <option value="Licenciatura en Artes" {{ $professor->u_degrees == 'Licenciatura en Artes' ? 'selected' : '' }}>Licenciatura en Artes</option>
                                            <option value="Licenciatura en Música" {{ $professor->u_degrees == 'Licenciatura en Música' ? 'selected' : '' }}>Licenciatura en Música</option>
                                            <option value="Licenciatura en Educación Física" {{ $professor->u_degrees == 'Licenciatura en Educación Física' ? 'selected' : '' }}>Licenciatura en Educación Física</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="a_subjects" class="form-label">Materia Asignada</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        <select class="form-select" id="a_subjects" name="a_subjects" required>
                                            <option value="">Seleccione una materia</option>
                                            <option value="M   atematicas" {{ $professor->a_subjects == 'Matematicas' ? 'selected' : '' }}>Matemáticas</option>
                                            <option value="Lenguaje" {{ $professor->a_subjects == 'Lenguaje' ? 'selected' : '' }}>Lenguaje y Literatura</option>
                                            <option value="Ciencias Naturales" {{ $professor->a_subjects == 'Ciencias Naturales' ? 'selected' : '' }}>Ciencias Naturales</option>
                                            <option value="Ciencias Sociales" {{ $professor->a_subjects == 'Ciencias Sociales' ? 'selected' : '' }}>Ciencias Sociales</option>
                                            <option value="Historia" {{ $professor->a_subjects == 'Historia' ? 'selected' : '' }}>Historia</option>
                                            <option value="Geografía" {{ $professor->a_subjects == 'Geografía' ? 'selected' : '' }}>Geografía</option>
                                            <option value="Física" {{ $professor->a_subjects == 'Física' ? 'selected' : '' }}>Física</option>
                                            <option value="Química" {{ $professor->a_subjects == 'Química' ? 'selected' : '' }}>Química</option>
                                            <option value="Biología" {{ $professor->a_subjects == 'Biología' ? 'selected' : '' }}>Biología</option>
                                            <option value="ingles" {{ $professor->a_subjects == 'ingles' ? 'selected' : '' }}>Inglés</option>
                                            <option value="Francés" {{ $professor->a_subjects == 'Francés' ? 'selected' : '' }}>Francés</option>
                                            <option value="Informática" {{ $professor->a_subjects == 'Informática' ? 'selected' : '' }}>Informática</option>
                                            <option value="Educación Artística" {{ $professor->a_subjects == 'Educación Artística' ? 'selected' : '' }}>Educación Artística</option>
                                            <option value="Música" {{ $professor->a_subjects == 'Música' ? 'selected' : '' }}>Música</option>
                                            <option value="Educación Física" {{ $professor->a_subjects == 'Educación Física' ? 'selected' : '' }}>Educación Física</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="hours_a" class="form-label">Horas Asignadas</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="number" class="form-control" id="hours_a" name="hours_a" min="1" max="40" value="{{$professor->hours_a }}" required>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-user-plus me-2"></i>Registrar Profesor
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