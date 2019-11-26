import Vue from 'vue'
import VueRouter from 'vue-router'
import vSelect from 'vue-select'

require('./bootstrap');

Vue.use(VueRouter)
Vue.component('v-select', vSelect);

import App from './views/app'

import People from './views/People'
import Planets from './views/Planets'
import Starships from './views/Starships'

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'text-gray-900 bg-gray-400',
    routes: [
        {
            path: '/',
            redirect: { name: 'people' }
        },
        {
            path: '/people/:id',
            name: 'people',
            component: People,
            props: true
        },
        {
            path: '/planets',
            name: 'planets',
            component: Planets
        },
        {
            path: '/starships',
            name: 'starships',
            component: Starships
        },
        {
            path: '/*',
            redirect: { name: 'people'}
        }
    ]
});

const app = new Vue({
    el: '#app',
    components: {
                    App,
                    People,
                    Planets,
                    Starships
                },
    router
});

window.router = router;
window.app = app;
