'use strict';

import Router from './router.js';

import HomeView from './views/home.js';
import ReferencesView from './views/references.js';
import RolesView from './views/roles.js';
import StatesView from './views/states.js';
import ThemesView from './views/themes.js';

let routerContainer = document.getElementById('content');
let router = new Router(routerContainer);

router.routes([
    { path: '/', component: HomeView },
    { path: '/references', component: ReferencesView },
    { path: '/themes', component: ThemesView },
    { path: '/roles', component: RolesView },
    { path: '/states', component: StatesView },
]);

router.execute();
