export function Store(base) {
    return class extends base {

        constructor(...args) {
            super(...args);

            this.state = {};

            this.addEventListener('connect-store', evt => {
                evt.stopPropagation();
                evt.detail.store = this;
            });
        }
    }
}

export function connect(component) {

    if (component.connectedCallback) {
        let connectedCallback = component.connectedCallback;
        component.connectedCallback = function () {
            connectedCallback();
            let event = new CustomEvent('connect-store', {
                bubbles: true,
                cancelable: false,
                composed: true,
                detail: {}
            });

            component.dispatchEvent(event);

            this.store = event.detail.store;
        }
    } else {
        component.connectedCallback = function () {
            let event = new CustomEvent('connect-store', {
                bubbles: true,
                cancelable: false,
                composed: true,
                detail: {}
            });

            component.dispatchEvent(event);

            this.store = event.detail.store;
        }
    }




    return component;
}