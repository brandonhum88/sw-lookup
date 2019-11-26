<template>
    <div class="w-11/12 h-56 mx-6 mb-8 p-6 bg-white shadow flex flex-col justify-between">
        <div class="flex items-center">
            <div class="w-16 h-16 rounded-full bg-gray-400 flex justify-center items-center">
                <PersonSvg width="36" height="36"></PersonSvg>
            </div>
            <div class="h-8 ml-4">
                <div class="font-bold text-gray-900 text-lg">{{ info.name }}</div>
                <div class="text-gray-700 text-sm">
                    <span>{{ info.birth_year }}</span>
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-between">
                <div class="w-1/4">
                    <div class="text-xs text-gray-500">Gender</div>
                    <div class="capitalize">{{ info.gender }}</div>
                </div>
                <div class="w-1/4">
                    <div class="text-xs text-gray-500">Mass</div>
                    <div>{{ info.mass }} kg</div>
                </div>
                <div class="w-1/4">
                    <div class="text-xs text-gray-500">Height</div>
                    <div>{{ info.height }} cm</div>
                </div>
            </div>
            <div class="flex justify-between mt-2">
                <div class="w-1/4">
                    <div class="text-xs text-gray-500">Hair Color</div>
                    <div class="capitalize">{{ info.hair_color }}</div>
                </div>
                <div class="w-1/4">
                    <div class="text-xs text-gray-500">Eye Color</div>
                    <div class="capitalize">{{ info.eye_color }}</div>
                </div>
                <div class="w-1/4">
                    <div class="text-xs text-gray-500">Skin Color</div>
                    <div class="capitalize">{{ info.skin_color }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PersonSvg from './svg/person-svg'

    export default {
        props: ['info'],
        components: {
            PersonSvg
        }
    }
</script>
