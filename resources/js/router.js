import { createRouter, createWebHashHistory} from 'vue-router';
import HomeComponent from './components/home/MainComponent.vue';
// import RecyclerComponent from './components/recycler/MainComponent.vue';
// import TerminalComponent from './components/terminal/MainComponent.vue';
// import PostamatComponent from './components/postamat/MainComponent.vue';
import PosterminalComponent from './components/posterminal/MainComponent.vue';
// import CardomatComponent from './components/cardomat/MainComponent.vue';

export default createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: '/', component: HomeComponent, alias: '/' },
        // { path: '/recycler', component: RecyclerComponent },
        // { path: '/terminal', component: TerminalComponent },
        // { path: '/postamat', component: PostamatComponent },
        { path: '/posterminal', component: PosterminalComponent },
        // { path: '/cardomat', component: CardomatComponent },
    ]
});
