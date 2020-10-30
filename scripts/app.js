'use strict';

import { Store } from './components/store.js';
import { Router } from './router.js';

import HomeView from './views/home.js';
import ReferencesView from './views/references.js';
import RolesView from './views/roles.js';
import StatesView from './views/states.js';
import ThemesView from './views/themes.js';

class App extends Store(Router(HTMLElement)) {

    constructor() {
        super();
        
        this.routes = [
            { path: '/', component: HomeView },
            { path: '/references', component: ReferencesView },
            { path: '/themes', component: ThemesView },
            { path: '/roles', component: RolesView },
            { path: '/states', component: StatesView },
        ];
    }
}

customElements.define('app-element', App);

const app = document.createElement('app-element');

app.route();

document.getElementById('content').appendChild(app);