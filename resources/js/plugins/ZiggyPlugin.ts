import type { App, Plugin } from 'vue';
import routeFn from 'ziggy-js';

export const ZiggyPlugin: Plugin = {
    install: (app: App, options) => {
        app.config.globalProperties.$ziggyRoute = routeFn;
    }
};
