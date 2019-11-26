<template>
    <a href="#" @click="viewPerson()">
        <div class="w-11/12 h-32 mx-6 mb-8 p-6 bg-white shadow hover:bg-blue-100">
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
        </div>
    </a>
</template>

<script>
    import PersonSvg from './svg/person-svg'

    export default {
        props: ['info'],
        methods: {
            viewPerson() {
                router.push({ path: '/people/' + this.info.id });
            }
        },
        components: {
            PersonSvg
        }
    }
</script>
