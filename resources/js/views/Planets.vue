<template>
    <div>
        <ul class="flex flex-wrap">
            <li v-if="loading" v-for="n in 10">
                <PlanetPlaceholder></PlanetPlaceholder>
            </li>

            <li v-for="info in resources">
                <Planet :info="info"></Planet>
            </li>
        </ul>

        <div v-if="error">{{ error }}</div>

        <paginate
            v-if="!error && pageCount > 1"
            :page-count="pageCount"
            :click-handler="changePage"
            :container-class="'flex my-8 justify-center'"
            :page-link-class="'px-2 mx-2 text-gray-600 text-md outline-none'"
            :prev-link-class="'mx-2 text-gray-600 text-md outline-none'"
            :next-link-class="'mx-2 text-gray-600 text-md outline-none'"
            :active-class="'border border-blue-400 rounded-sm'">
        </paginate>
    </div>
</template>

<script>
    import Global from './Global'
    import Paginate from 'vuejs-paginate'
    import Planet from '../components/Planet'
    import PlanetPlaceholder from '../components/placeholders/Planet'

    export default {
        extends: Global,
        computed: {
            fetchResources() {
                this.resources = null;
                this.loading = true;
                axios
                    .get('/api/planets?page=' + this.page)
                    .then(response => {
                        this.loading = false;
                        this.resources = response.data.resources;
                        this.count = response.data.count;
                    }).catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            }
        },
        components: {
            Paginate,
            Planet,
            PlanetPlaceholder
        }
    }
</script>
