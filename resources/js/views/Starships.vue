<template>
    <div>
        <ul class="flex flex-wrap">
            <!-- Placeholders until page data is loaded -->
            <li v-if="loading" v-for="n in 10" class="w-full xl:w-1/2">
                <StarshipPlaceholder></StarshipPlaceholder>
            </li>

            <li v-for="info in resources" class="w-full xl:w-1/2">
                <Starship :info="info"></Starship>
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
    import Starship from '../components/Starship'
    import StarshipPlaceholder from '../components/placeholders/Starship'

    export default {
        extends: Global,
        computed: {
            fetchResources() {
                this.resources = null;
                this.loading = true;
                axios
                    .get('/api/starships?page=' + this.page)
                    .then(response => {
                        this.loading = false;
                        this.resources = response.data.resources;
                        this.count = response.data.count;
                    }).catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.rmessage;
                    });
            }
        },
        components: {
            Paginate,
            Starship,
            StarshipPlaceholder
        }
    }
</script>
