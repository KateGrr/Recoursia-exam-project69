import { createRouter, createWebHashHistory} from 'vue-router';

import HomeComponent from './components/home/HomeComponent.vue';


// import RecyclerActiveComponent from './components/recycler/RecyclerActiveComponent.vue';
// import RecyclerDefectiveComponent from './components/recycler/RecyclerDefectiveComponent.vue';
// import RecyclerSolutionsComponent from './components/recycler/RecyclerSolutionsComponent.vue';
// import RecyclerDeletedComponent from './components/recycler/RecyclerDeletedComponent.vue';

// import TerminalActiveComponent from './components/terminal/TerminalActiveComponent.vue';
// import TerminalDefectiveComponent from './components/terminal/TerminalDefectiveComponent.vue';
// import TerminalSolutionsComponent from './components/terminal/TerminalSolutionsComponent.vue';
// import TerminalDeletedComponent from './components/terminal/TerminalDeletedComponent.vue';

import PostamatActiveComponent from './components/postamat/PostamatActiveComponent.vue';
import PostamatDefectiveComponent from './components/postamat/PostamatDefectiveComponent.vue';
// import PostamatSolutionsComponent from './components/postamat/PostamatSolutionsComponent.vue';
// import PostamatDeletedComponent from './components/postamat/PostamatDeletedComponent.vue';

// import PosterminalActiveComponent from './components/posterminal/PosterminalActiveComponent.vue';
// import PosterminalDefectiveComponent from './components/posterminal/PosterminalDefectiveComponent.vue';
// import PosterminalSolutionsComponent from './components/posterminal/PosterminalSolutionsComponent.vue';
// import PosterminalDeletedComponent from './components/posterminal/PosterminalDeletedComponent.vue';

// import CardomatActiveComponent from './components/cardomat/CardomatActiveComponent.vue';
// import CardomatDefectiveComponent from './components/cardomat/CardomatDefectiveComponent.vue';
// import CardomatSolutionsComponent from './components/cardomat/CardomatSolutionsComponent.vue';
// import CardomatDeletedComponent from './components/cardomat/CardomatDeletedComponent.vue';

export default createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: '/', component: HomeComponent, alias: '/' },

        // { path: '/recycler/active', component: RecyclerActiveComponent },
        // { path: '/recycler/defective', component: RecyclerDefectiveComponent },
        // { path: '/recycler/solutions', component: RecyclerSolutionsComponent },
        // { path: '/recycler/deleted', component: RecyclerDeletedComponent },

        // { path: '/terminal/active', component: TerminalActiveComponent },
        // { path: '/terminal/defective', component: TerminalDefectiveComponent },
        // { path: '/terminal/solutions', component: TerminalSolutionsComponent },
        // { path: '/terminal/deleted', component: TerminalDeletedComponent },

        { path: '/postamat/active', component: PostamatActiveComponent },
        { path: '/postamat/defective', component: PostamatDefectiveComponent },
        // { path: '/postamat/solutions', component: PostamatSolutionsComponent },
        // { path: '/postamat/deleted', component: PostamatDeletedComponent },

        // { path: '/posterminal/active', component: PosterminalActiveComponent },
        // { path: '/posterminal/defective', component: PosterminalDefectiveComponent },
        // { path: '/posterminal/solutions', component: PosterminalSolutionsComponent },
        // { path: '/posterminal/deleted', component: PosterminalDeletedComponent },

        // { path: '/cardomat/active', component: CardomatActiveComponent },
        // { path: '/cardomat/defective', component: CardomatDefectiveComponent },
        // { path: '/cardomat/solutions', component: CardomatSolutionsComponent },
        // { path: '/cardomat/deleted', component: CardomatDeletedComponent },

    ]
});
