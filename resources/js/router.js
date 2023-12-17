import { createRouter, createWebHistory} from 'vue-router';

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
import PostamatSolutionsComponent from './components/postamat/PostamatSolutionsComponent.vue';
import PostamatDeletedComponent from './components/postamat/PostamatDeletedComponent.vue';

import PosterminalActiveComponent from './components/posterminal/PosterminalActiveComponent.vue';
import PosterminalDefectiveComponent from './components/posterminal/PosterminalDefectiveComponent.vue';
import PosterminalSolutionsComponent from './components/posterminal/PosterminalSolutionsComponent.vue';
import PosterminalDeletedComponent from './components/posterminal/PosterminalDeletedComponent.vue';

import CardomatActiveComponent from './components/cardomat/CardomatActiveComponent.vue';
import CardomatDefectiveComponent from './components/cardomat/CardomatDefectiveComponent.vue';
import CardomatSolutionsComponent from './components/cardomat/CardomatSolutionsComponent.vue';
import CardomatDeletedComponent from './components/cardomat/CardomatDeletedComponent.vue';

export default createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: HomeComponent, alias: '/', meta:{title: 'Recoursia 69'}},

        // { path: '/recycler/active',    component: RecyclerActiveComponent,    meta:{title: 'Recycler Active'}},
        // { path: '/recycler/defective', component: RecyclerDefectiveComponent, meta:{title: 'Recycler Defective'}},
        // { path: '/recycler/solutions', component: RecyclerSolutionsComponent, meta:{title: 'Recycler Solutions'}},
        // { path: '/recycler/deleted',   component: RecyclerDeletedComponent,   meta:{title: 'Recycler Deleted'}},

        // { path: '/terminal/active',    component: TerminalActiveComponent,    meta:{title: 'Terminal Active'}},
        // { path: '/terminal/defective', component: TerminalDefectiveComponent, meta:{title: 'Terminal Defective'}},
        // { path: '/terminal/solutions', component: TerminalSolutionsComponent, meta:{title: 'Terminal Solutions'}},
        // { path: '/terminal/deleted',   component: TerminalDeletedComponent,   meta:{title: 'Terminal Deleted'}},

        { path: '/postamat/active',    component: PostamatActiveComponent,    meta:{title: 'Postamat Active'}},
        { path: '/postamat/defective', component: PostamatDefectiveComponent, meta:{title: 'Postamat Defective'}},
        { path: '/postamat/solutions', component: PostamatSolutionsComponent, meta:{title: 'Postamat Solutions'}},
        { path: '/postamat/deleted',   component: PostamatDeletedComponent,   meta:{title: 'Postamat Deleted'}},

        { path: '/posterminal/active',    component: PosterminalActiveComponent,    meta:{title: 'Posterminal Active'}},
        { path: '/posterminal/defective', component: PosterminalDefectiveComponent, meta:{title: 'Posterminal Defective'}},
        { path: '/posterminal/solutions', component: PosterminalSolutionsComponent, meta:{title: 'Posterminal Solutions'}},
        { path: '/posterminal/deleted',   component: PosterminalDeletedComponent,   meta:{title: 'Posterminal Deleted'}},

        { path: '/cardomat/active',    component: CardomatActiveComponent,    meta:{title: 'Cardomat Active'}},
        { path: '/cardomat/defective', component: CardomatDefectiveComponent, meta:{title: 'Cardomat Defective'}},
        { path: '/cardomat/solutions', component: CardomatSolutionsComponent, meta:{title: 'Cardomat Solutions'}},
        { path: '/cardomat/deleted',   component: CardomatDeletedComponent,   meta:{title: 'Cardomat Deleted'}},

    ]
});