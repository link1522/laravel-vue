import type { App, Plugin } from 'vue';

export const ZiggyPlugin: Plugin = {
    install: (app: App, options) => {
        app.config.globalProperties.$route = (pathName: string) => {
            return (window as any).route(pathName);
        };
    }
};
