import Vue from 'vue';
import Dashboard from './Pages/Dashboard.vue'

//Importar Componentes 
//Admin
import inicio from './Pages/Inicio';

//Crear Componentes 
//Admin
Vue.component('inicio', inicio);

Vue.config.productionTip = false

new Vue({
    render: h => h(Dashboard)
}).$mount('#app')