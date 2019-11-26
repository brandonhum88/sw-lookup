<template>
    <div>
        <ul class="flex flex-wrap justify-between">
            <!-- Placeholders until page data is loaded -->
            <li v-if="loading" v-for="n in placeHolderCount" class="w-full lg:w-1/2 xl:w-1/3">
                <PersonPlaceholder></PersonPlaceholder>
            </li>

            <li v-for="info in resources" class="w-full lg:w-1/2 xl:w-1/3">
                <Person :info="info"></Person>
            </li>
        </ul>

        <div v-if="error && characterId" class="p-5 mb-8 mx-5 bg-red-100 border border-red-600 text-red-600">Data not found</div>
        <div v-else-if="error" class="p-5 bg-red-100 border border-red-600 text-red-600">{{ error }}</div>

        <button
            v-if="characterId"
            class="flex items-center py-3 px-5 ml-5 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-700"
            @click="viewAll()">
                View All People
        </button>

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
    import Person from '../components/Person'
    import PersonPlaceholder from '../components/placeholders/Person'

    export default {
        extends: Global,
        props: [ 'id' ],
        methods: {
            viewAll() {
                router.push({ path: '/people/all' });
            }
        },
        computed: {
            characterId() {
                if (this.id == 'all') return 0;

                return this.id;
            },
            placeHolderCount() {
                return this.characterId ? 1 : 10;
            },
            fetchResources() {
                this.resources = null;
                this.loading = true;

                if (this.characterId)
                {
                    var url = '/api/people/' + this.characterId;
                }
                else
                {
                    var url = '/api/people?page=' + this.page
                }

                axios
                    .get(url)
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
            Person,
            PersonPlaceholder
        }
    }
</script>
