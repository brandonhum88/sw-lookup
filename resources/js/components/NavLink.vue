<template>
    <div class="mt-2 -mx-3">
        <router-link :to="{ name: route }" class="flex justify-between items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-600">
            <span class="capitalize">{{ route }}</span>
        </router-link>
    </div>
</template>

<script>
    export default {
        props: [ 'route' ]
    }
</script>
