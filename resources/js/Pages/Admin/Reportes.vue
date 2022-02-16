<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-bold text-xl text-blue-900 leading-tight">
                        Reportes
                    </h2>
                    <br>
                    Usted se encuentra en Reportes!!
                </div>
            </div>
        </div>
    </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
}
</script>