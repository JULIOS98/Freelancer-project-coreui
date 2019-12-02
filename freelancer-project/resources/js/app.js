/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);

Vue.component('pagos-component', require('./components/MetodosPagoComponent.vue').default);
//Vue.component('pagos_usuarios-component', require('./components/Ingreso.vue').default);

//Componentes Usuarios
Vue.component('usuarios-component', require('./components/UsuariosComponent.vue').default);
Vue.component('roles-component', require('./components/RolesComponent.vue').default);
Vue.component('personas-component', require('./components/PersonasComponent.vue').default);
Vue.component('perfil-usuario-component', require('./components/PerfilUsuarioComponent.vue').default);

/*Componentes Proyecto*/
Vue.component('dashboard-proyectos-component', require('./components/DashboardProyectosComponent.vue').default);
Vue.component('usuarios-proyectos-component', require('./components/UsuariosProyectosComponent.vue').default);
Vue.component('task-proyectos-component', require('./components/TaskProyectosComponent.vue').default);
Vue.component('proyectos-component', require('./components/ProyectosComponent.vue').default);
Vue.component('milestones-proyectos-component', require('./components/MilestonesProyectosComponent.vue').default);
Vue.component('issues-proyectos-component', require('./components/IssuesProyectosComponent.vue').default);
Vue.component('gastos-proyectos-component', require('./components/GastosProyectosComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: 
    {
        menu : 0,
        ruta : 'http://127.0.0.1:8000'
    }
});
