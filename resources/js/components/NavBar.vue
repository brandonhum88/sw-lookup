<template>
    <nav class="sm:flex lg:block lg:mt-8">
        <search></search>
        <div v-for="route in $router.options.routes">
            <nav-link v-if="route.name" :route="route.name" ></nav-link>
        </div>
    </nav>
</template>

<script>
    import NavLink from './NavLink'
    import Search from './Search'

    export default {
        components: {
            Search,
            NavLink
        },

    }
</script>
