<template>
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
                                <tr v-for="professor in professors" :key="professor.id">
                                    <td>{{ professor.name }}</td>
                                    <td>{{ professor.lastname }}</td>
                                    <td>{{ professor.cedula }}</td>
                                    <td>{{ professor.age }}</td>
                                    <td>{{ professor.gender }}</td>
                                    <td>{{ professor.u_degrees }}</td>
                                    <td>{{ professor.a_subjects }}</td>
                                    <td>{{ professor.hours_a }}</td>
                                    <td>
                                        <a :href="`/professor/${professor.id}/editar`" class="btn btn-sm btn-edit me-1" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a :href="`/professor/${professor.id}/eliminar`" class="btn btn-sm btn-delete" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    props: {
        professors: {
            type: Array,
            required: true
        }
    },
}
</script>

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
