<template>
    <Head title="Estados" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis solicitudes
            </h2>
        </template>
        <TableSEA v-bind:arrayDatosPadre="areas"> 


        </TableSEA>
    </BreezeAuthenticatedLayout>
</template>


<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import TableSEA from '@/Components/TableSEA.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        TableSEA,
    },
    data(){
        return{
            estatus: [],
            arrayErrores: []
        }
    },
    methods:{
        getEstatus(){
            let me = this;
            axios.get('estatus').then(function(response){
                console.log(response.data.estatus.data);
                me.estatus=response.data.estatus.data;
                
            }).catch(function(error){
                this.arrayErrores = error.data;
            });
        }
    },
    mounted(){
        this.getEstatus();
    }
}
</script>
