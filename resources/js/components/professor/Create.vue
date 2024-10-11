<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <div class="form-header">
                        <h1 class="display-4">Registrar Profesor</h1>
                        <p class="lead">Completa el formulario para añadir un nuevo profesor al sistema</p>
                    </div>
                    <div class="form-body">
                        <form id="registroProfesor" action="/professor/success" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control" id="cedula" name="cedula" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Edad</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                        <input type="number" class="form-control" id="age" name="age" min="18" max="100" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Género</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Seleccione un género</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="u_degrees" class="form-label">Título Universitario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <select class="form-select" id="u_degrees" name="u_degrees" required>
                                            <option value="">Seleccione un título</option>
                                            <option value="Licenciatura en Educación">Licenciatura en Educación</option>
                                            <option value="Licenciatura en Matemáticas">Licenciatura en Matemáticas</option>
                                            <option value="Licenciatura en Literatura">Licenciatura en Literatura</option>
                                            <option value="Licenciatura en historia">Licenciatura en Historia</option>
                                            <option value="Licenciatura en biologia">Licenciatura en Biología</option>
                                            <option value="Licenciatura en quimica">Licenciatura en Química</option>
                                            <option value="Licenciatura en fisica">Licenciatura en Física</option>
                                            <option value="Licenciatura en idiomas">Licenciatura en Idiomas</option>
                                            <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
                                            <option value="Licenciatura en Artes">Licenciatura en Artes</option>
                                            <option value="Licenciatura en Música">Licenciatura en Música</option>
                                            <option value="Licenciatura en Educación Física">Licenciatura en Educación Física</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="a_subjects" class="form-label">Materia Asignada</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        <select class="form-select" id="a_subjects" name="a_subjects" required>
                                            <option value="">Seleccione una materia</option>
                                            <option value="Matematicas">Matemáticas</option>
                                            <option value="Lenguaje">Lenguaje y Literatura</option>
                                            <option value="Ciencias Naturales">Ciencias Naturales</option>
                                            <option value="Ciencias Sociales">Ciencias Sociales</option>
                                            <option value="Historia">Historia</option>
                                            <option value="Geografía">Geografía</option>
                                            <option value="fisica">Física</option>
                                            <option value="Química">Química</option>
                                            <option value="Biología">Biología</option>
                                            <option value="Inglés">Inglés</option>
                                            <option value="Francés">Francés</option>
                                            <option value="Informática">Informática</option>
                                            <option value="Educación Artística">Educación Artística</option>
                                            <option value="Música">Música</option>
                                            <option value="Educación Física">Educación Física</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="hours_a" class="form-label">Horas Asignadas</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="number" class="form-control" id="hours_a" name="hours_a" min="1" max="40" required>
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
</template>

<script></script>

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
