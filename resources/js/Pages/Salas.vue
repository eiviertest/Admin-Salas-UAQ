<template>
    <Head title="Salas" />

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
            salas: [],
            arrayErrores: []
        }
    },
    methods:{
        getSalas(){
            let me = this;
            axios.get('sala').then(function(response){
                console.log(response.data.salas.data);
                me.salas=response.data.salas.data;
                
            }).catch(function(error){
                this.arrayErrores = error.data;
            });
        }
    },
    mounted(){
        this.getSalas();
    }
}
</script>
