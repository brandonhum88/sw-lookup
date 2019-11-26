<template>
    <div class="w-11/12 h-32 mx-6 mb-8 p-3 bg-white shadow flex flex-col justify-between">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-full">
                <StarshipSvg width="48" height="48"></StarshipSvg>
            </div>
            <div class="h-8 ml-5">
                <div class="font-extrabold text-gray-900 text-md">{{ info.name }}</div>
                <div class="text-sm text-gray-600">{{ info.model }}</div>
            </div>
        </div>

        <div class="flex justify-between px-4 relative">
            <div class="ml-12 pl-1">
                <div class="text-xs text-blue-400">Class</div>
                <div class="text-md text-gray-700 capitalize">{{ info.starship_class }}</div>
            </div>
            <div class="absolute bottom-0 right-0">
                <span class="text-lg text-green-400 font-bold">{{ info.MGLT }}</span> <span class="text-xs">MGLT</span>
            </div>
        </div>
    </div>
</template>

<script>
    import StarshipSvg from './svg/starship-svg'

    export default {
        props: [ 'info' ],
        components: {
            StarshipSvg
        }
    }
</script>
