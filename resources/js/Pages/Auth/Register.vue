<template>
    <Head title="Register" />

    <BreezeValidationErrors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="nomPer" value="Nombre" />
            <BreezeInput id="nomPer" type="text" class="mt-1 block w-full" v-model="form.nomPer" required autofocus autocomplete="Nombre" />
        </div>

        <div>
            <BreezeLabel for="apePatPer" value="Apellido Paterno" />
            <BreezeInput id="apePatPer" type="text" class="mt-1 block w-full" v-model="form.apePatPer" required autofocus autocomplete="Apellido Paterno" />
        </div>

        <div>
            <BreezeLabel for="apeMatPer" value="Apellido Materno" />
            <BreezeInput id="apeMatPer" type="text" class="mt-1 block w-full" v-model="form.apeMatPer" required autofocus autocomplete="Apellido Materno" />
        </div>

        <div class="mt-4">
            <BreezeLabel for="email" value="Email" />
            <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
        </div>

        <div>
            <BreezeLabel for="telPer" value="Número de contacto" />
            <BreezeInput id="telPer" type="number" maxlength="11" minlength="9" class="mt-1 block w-full" v-model="form.telPer" required autofocus />
        </div>

        <div>
            <BreezeLabel for="idArea" value="¿A qué área, institución o facultad pertenece?" />
            <BreezeInput id="idArea" type="number" class="mt-1 block w-full" v-model="form.idArea" required autofocus />
        </div>

        <div class="mt-4">
            <BreezeLabel for="password" value="Contraseña" />
            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <BreezeLabel for="password_confirmation" value="Confirmar contraseña" />
            <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Ya estoy registrado
            </Link>

            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Registrarse
            </BreezeButton>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    data() {
        return {
            form: this.$inertia.form({
                nomPer: '',
                apePatPer: '',
                apeMatPer: '',
                telPer: 0,
                idArea: 1,
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
