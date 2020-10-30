'use strict';

import Router from './router.js';

import HomeView from './views/home.js';

let routerContainer = document.getElementById('content');
let router = new Router(routerContainer);

router.routes([
    { path: '/', component: HomeView },
]);

router.execute();
