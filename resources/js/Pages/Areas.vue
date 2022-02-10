<template>
    <Head title="Areas" />

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
            areas: [],
            arrayErrores: []
        }
    },
    methods:{
        getAreas(){
            let me = this;
            axios.get('area').then(function(response){
                console.log(response.data.areas.data);
                me.areas=response.data.areas.data;
                
            }).catch(function(error){
                this.arrayErrores = error.data;
            });
        }
    },
    mounted(){
        this.getAreas();
    }
}
</script>
