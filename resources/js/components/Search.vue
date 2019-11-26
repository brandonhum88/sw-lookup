<template>
    <div class="relative mb-4 flex">
        <span class="absolute inset-y-0 left-0  flex items-center">
            <svg class="h-4 w-4 text-gray-600 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    stroke="currentColor"
                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
                />
            </svg>
        </span>
        <!-- <input class="flex-1 inline-block rounded-lg border border-gray-400 pl-10 py-2 pr-2 -ml-3 -mr-3 text-sm text-gray-900 placeholder-gray-600" placeholder="Who are you looking for?"> -->
        <v-select
            class="flex-1 inline-block rounded-lg border border-gray-400 pl-8 py-2 pr-2 -ml-3 -mr-3 text-sm text-gray-900 placeholder-gray-600 bg-white"
            label="name"
            ref="search"
            :options="options"
            :filterable="false"
            @input="viewPerson"
            @search="fetchPerson" >
            <template slot="no-options">
                Who are you looking for?
            </template>
        </v-select>
    </div>
</template>

<script>
    window._ = require('lodash');

    import Vue from 'vue'
    import vSelect from 'vue-select'

    export default {
        data() {
            return {
                options: [],
                selected: null
            }
        },
        methods: {
            fetchPerson(search, loading) {
                loading(true);
                this.search(loading, search, this);
            },
            search: _.debounce((loading, search, vm) => {
                axios
                    .get('/api/people/search?query=' + escape(search))
                    .then(response => {
                        loading(false);
                        vm.options = response.data;
                    }).catch(error => {
                        loading(false);
                        alert(error.response.data.message || error.message);
                    });
            }, 500),
            viewPerson(value) {
                router.push({ path : '/people/' + value.id });
                this.$refs.search.clearSelection();

            }
        },
        components: {
            vSelect
        }
    }
</script>
