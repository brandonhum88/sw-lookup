<template>
    <div class="flex">
        <SWLookup height="12" width="12"></SWLookup>
        <div class="logo-text ml-4 w-32">Star Wars Lookup</div>
    </div>
</template>

<script>
    import SWLookup from './svg/swlookup'

    export default {
        components: {
            SWLookup
        }
    }
</script>

<style scoped>
    @font-face {
        font-family: StarJedi;
        src: url('/fonts/Starjedi.ttf');
    }

    .logo-text {
        font-family: StarJedi;
    }
</style>
