<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Estudiantes - Sistema Educativo</title>
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
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-bottom: none;
        }
        .table {
            margin-bottom: 0;
        }
        .table th {
            background-color: rgba(142, 68, 173, 0.1);
            color: var(--primary-color);
            font-weight: 600;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-edit, .btn-delete {
            border-radius: 20px;
            padding: 5px 15px;
            transition: all 0.3s ease;
        }
        .btn-edit {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        .btn-edit:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-delete {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        .btn-delete:hover {
            background-color: #c0392b;
            border-color: #c0392b;
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
                        <a class="nav-link active" aria-current="page" href="#">Listado de Profesores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center mb-0">Listado de profesores</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cédula</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th>Titulo universitario</th>
                                <th>Materia asignada</th>
                                <th>Horas asignadas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professors as $professor)
                                <tr>
                                   <td>{{ $professor->name }}</td>
                                   <td>{{ $professor->lastname }}</td>
                                   <td>{{ $professor->cedula }}</td>
                                   <td>{{ $professor->age }}</td>
                                   <td>{{ $professor->gender }}</td>
                                   <td>{{ $professor->u_degrees }}</td>
                                   <td>{{ $professor->a_subjects }}</td>
                                   <td>{{ $professor->hours_a }}</td>
                                   <td>
                                        <a href="/professor/{{$professor->id}}/editar" class="btn btn-sm btn-edit me-1" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/professor/{{$professor->id}}/eliminar" class="btn btn-sm btn-delete" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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