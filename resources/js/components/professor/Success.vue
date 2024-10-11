<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 success-container">
                <i class="fas fa-check-circle success-icon"></i>
                <h2 class="success-title">¡Registro Exitoso!</h2>
                <p class="mb-4">El profesor ha sido registrado correctamente en nuestro sistema.</p>
                <a href="/professor/listar" class="btn btn-custom">Mostrar Registros</a>
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
