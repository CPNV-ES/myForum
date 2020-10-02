'use strict';

import Router from './router.js';

import HomeView from './views/home.js';
import TopicView from './views/topic.js';

let routerContainer = document.getElementById('content');
let router = new Router(routerContainer);

router.routes([
    { path: '/', component: HomeView },
    { path: '/topic', component: TopicView }
]);

router.execute();
