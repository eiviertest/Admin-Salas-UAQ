<template>
    <Link class="block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
}
</script>
