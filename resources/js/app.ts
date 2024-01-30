import { createApp, h, type DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyPlugin } from './plugins/ZiggyPlugin';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob<DefineComponent>('./pages/**/*.vue', {
            eager: true
        });
        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyPlugin)
            .mount(el);
    }
});
