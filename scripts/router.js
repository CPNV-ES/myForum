export function Router(base) {
    return class extends base {

        constructor(...args) {
            super(...args);

            this._addEvents();
        }

        _addEvents() {
            document.addEventListener('click', evt => {
                if (evt.target.nodeName === 'A') {
                    evt.preventDefault();
                    evt.target.blur();
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
            for (let child of this.children) {
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

            for (let route of this.routes) {
                if (path == route.path) {
                    let view = new route.component();

                    let viewElement = document.createElement('div');
                    viewElement.setAttribute('data-path', path);
                    viewElement.innerHTML = view.render();

                    if (pushState) {
                        history.pushState({ path }, '', path);
                    }

                    this.appendChild(viewElement);
                    return;
                }
            }
        }

        routes(routes) {
            this.routes = routes;
        }

        execute() {
            for (let route of this.routes) {
                if (window.location.pathname == route.path) {
                    this._route(route.path);
                }
            }
        }
    }
}