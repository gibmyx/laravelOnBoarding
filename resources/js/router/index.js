import { createRouter, createWebHistory } from "vue-router";

import home from "../components/HomePage.vue";
import create_professor from "../components/professor/Create.vue";
import editar_professor from "../components/professor/Editar.vue";
import listar_professor from "../components/professor/Listar.vue";
import success_professor from "../components/professor/Success.vue";
import create_student from "../components/student/Create.vue";
import editar_student from "../components/student/Editar.vue";
import listar_student from "../components/student/Listar.vue";
import success_student from "../components/student/Success.vue";

const routes = [
    {
        path: "/",
        component: home,
    },

    {
        path: "/professor/vue/crear",
        component: create_professor,
    },

    {
        path: "/professor/vue/editar",
        component: editar_professor,
    },

    {
        path: "/professor/vue/listar",
        component: listar_professor,
    },

    {
        path: "/professor/vue/success",
        component: success_professor,
    },

    {
        path: "/student/vue/crear",
        component: create_student,
    },

    {
        path: "/student/vue/editar",
        component: editar_student,
    },

    {
        path: "/student/vue/listar",
        component: listar_student,
    },

    {
        path: "/student/vue/success",
        component: success_student,
    },
];

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: "active",
    routes,
});

export default router;
