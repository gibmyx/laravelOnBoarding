import './bootstrap';

import { createApp } from 'vue';

import app from './components/app.vue';

import home from './components/HomePage.vue';

import create_professor from './components/professor/Create.vue';

import editar_professor from './components/professor/Editar.vue';

import listar_professor from './components/professor/Listar.vue';

import success_professor from './components/professor/Success.vue';

import create_student from './components/student/Create.vue';

import editar_student from './components/student/Editar.vue';

import listar_student from './components/student/Listar.vue';

import success_student from './components/student/Success.vue';

import router from './router';

createApp(app).use(router).mount('#app');
createApp(home).use(router).mount('#home');
createApp(create_professor).use(router).mount('#create-professor');
createApp(editar_professor).use(router).mount('#editar-professor');
createApp(listar_professor).use(router).mount('#listar-professor');
createApp(success_professor).use(router).mount('#success-professor');
createApp(create_student).use(router).mount('#create-student');
createApp(editar_student).use(router).mount('#editar-student');
createApp(listar_student).use(router).mount('#listar-student');
createApp(success_student).use(router).mount('#success-student');