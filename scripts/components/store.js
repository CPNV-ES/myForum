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
    let event = new CustomEvent('connect-store', {
        bubbles: true,
        cancelable: false,
        composed: true,
        detail: {}
    });

    component.dispatchEvent(event);

    component.store = event.detail.store;
}