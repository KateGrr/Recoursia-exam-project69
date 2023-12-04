import { createRouter, createWebHashHistory} from 'vue-router';
import HomeComponent from './components/home/HomeComponent.vue';
// import RecyclerComponent from './components/recycler/MainComponent.vue';
// import TerminalComponent from './components/terminal/MainComponent.vue';
import PostamatComponent from './components/postamat/PostamatComponent.vue';
import PosterminalComponent from './components/posterminal/PosterminalComponent.vue';
// import CardomatComponent from './components/cardomat/MainComponent.vue';

export default createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: '/', component: HomeComponent, alias: '/' },
        // { path: '/recycler', component: RecyclerComponent },
        // { path: '/terminal', component: TerminalComponent },
        { path: '/postamat', component: PostamatComponent },
        { path: '/posterminal', component: PosterminalComponent },
        // { path: '/cardomat', component: CardomatComponent },
    ]
});
