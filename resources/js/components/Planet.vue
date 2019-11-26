<template>
    <div class="w-56 h-64 mx-6 mb-8 p-3 flex flex-col justify-between items-center bg-white shadow">
        <div class="w-24 h-24 rounded-full bg-gray-600 flex justify-between items-center">
            <PlanetSvg width="96" height="96"></PlanetSvg>
        </div>

        <span class="text-xl text-gray-800 font-bold">{{ info.name }}</span>

        <div class="flex-col text-gray-600 text-sm">
            <div>
                <span class="font-semi-bold w-20 inline-block text-right">Diameter:</span> <span>{{ info.diameter }} km</span>
            </div>
            <div>
                <span class="font-semi-bold w-20 inline-block text-right">Population:</span> <span>{{ population }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import PlanetSvg from './svg/planet-svg'

    export default {
        props: [ 'info' ],
        computed: {
            population: function() {
                if (this.info.population == 'unknown') return 'unknown';
                return Number(this.info.population).toLocaleString();
            }
        },
        components: {
            PlanetSvg
        }
    }
</script>
