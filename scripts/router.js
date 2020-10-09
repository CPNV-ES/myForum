export default class Router {

    constructor(container) {
        this._container = container;
        this._routes = [];

        this._addEvents();
    }

    _addEvents() {
        document.addEventListener('click', evt => {
            if (evt.target.nodeName === 'A') {
                evt.preventDefault();
                this._route(evt.target.pathname);
            }
        });

        window.addEventListener('popstate', evt => {
            evt.preventDefault();
            this._onPopState(evt);
        });
    }

    _onPopState(evt) {
        this._route(evt.state.path, false);
    }

    _route(path, pushState = true) {
        let hasMatched = false;
        for (let child of this._container.children) {
            if (child.getAttribute('data-path') == path) {
                child.style.display = '';
                hasMatched = true;
            } else {
                child.style.display = 'none';
            }
        }

        // We do not need to create a new element
        if (hasMatched) {
            if (pushState) {
                history.pushState({ path }, '', path);
            }
            
            return;
        }

        for (let route of this._routes) {
            if (path == route.path) {
                let view = new route.component();

                let viewElement = document.createElement('div');
                viewElement.setAttribute('data-path', path);
                viewElement.innerHTML = view.render();

                if (pushState) {
                    history.pushState({ path }, '', path);
                }

                this._container.appendChild(viewElement);
                return;
            }
        }
    }

    routes(routes) {
        this._routes = routes;
    }

    execute() {
        for (let route of this._routes) {
            if (window.location.pathname == route.path) {
                this._route(route.path);
            }
        }
    }
}