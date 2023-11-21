import 'mdb-vue-ui-kit/css/mdb.min.css';
import {createApp} from 'vue';
import {createRouter, createWebHistory} from 'vue-router';
import axios from 'axios';
import {routes} from './routes.js';
import Navigation from './components/Navigation.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: routes
});
const app = createApp(Navigation);
app.use(router);
app.mount('#app');