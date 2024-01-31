import { ComponentCustomProperties } from 'vue';
import routeFn from 'ziggy-js';

declare module 'vue' {
    interface ComponentCustomProperties {
        $ziggyRoute: typeof routeFn;
    }
}

declare global {
    var ziggyRoute: typeof routeFn;
}
