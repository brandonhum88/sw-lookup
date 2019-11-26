<template>
    <div class="h-screen flex sm:flex-col lg:flex-row" id="app">
        <!-- Nav Side Bar -->
        <div class="sm:w-full sm:h-24 sm:px-8 sm:flex sm:justify-between sm:items-center lg:w-80 lg:h-full lg:block lg:px-8 py-4 bg-gray-200 border-r">
            <logo></logo>
            <nav-bar></nav-bar>
        </div>

        <!-- Main View -->
        <div class="flex-1 py-4 px-12 min-w-0 bg-gray-100">
            <router-view :key="$route.name + ($route.params.id || '')"></router-view>
        </div>
    </div>
</template>

<script>
    import Logo from '../components/Logo'
    import NavBar from '../components/NavBar'

    export default {
        components: {
            Logo,
            NavBar
        }
    }
</script>
