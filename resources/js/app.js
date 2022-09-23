require('./bootstrap');

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import {Tabs, Tab} from 'vue3-tabs-component';
 
InertiaProgress.init();

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component('tabs', Tabs)
            .component('tab', Tab)
            .use(plugin)
            .mount(el);
    },
});