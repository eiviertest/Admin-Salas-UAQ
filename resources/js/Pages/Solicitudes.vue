<template>
    <Head title="Solicitudes" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis solicitudes
            </h2>
        </template>
        <TableSolUser> </TableSolUser>
    </BreezeAuthenticatedLayout>

</template>


<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import TableSolUser from '@/Components/TableSolUser.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        TableSolUser,
    },
}
</script>

