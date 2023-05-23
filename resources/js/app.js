import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { InertiaProgress } from '@inertiajs/progress'
import { darkModeKey, styleKey } from "./Data/config";
import { useMainStore } from "./stores/main.js";
import { useStyleStore } from "./stores/style.js";
import { createPinia } from "pinia";
import { Link } from '@inertiajs/vue3';
const pinia = createPinia();
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
InertiaProgress.init();
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('Link', Link)
            .mount(el);
    },

});
const mainStore = useMainStore(pinia);
const styleStore = useStyleStore(pinia);


/* App style */
styleStore.setStyle(localStorage[styleKey] ?? 'basic')

/* Dark mode */
if ((!localStorage[darkModeKey] && window.matchMedia('(prefers-color-scheme: dark)').matches) || localStorage[darkModeKey] === '1') {
  styleStore.setDarkMode(true)
} else{
    styleStore.setDarkMode(true)
}
