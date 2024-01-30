import { ComponentCustomProperties } from 'vue';

declare module 'vue' {
    interface ComponentCustomProperties {
        $route: (routeName: string) => string;
    }
}
