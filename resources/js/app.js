import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { MaskInput } from 'vue-3-mask'
import ElementPlus from 'element-plus'
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import 'element-plus/dist/index.css'
import 'element-plus/theme-chalk/dark/css-vars.css'
import '../css/app.css';

createInertiaApp({
    // title: (title) => `${title} - ${appName}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('MaskInput', MaskInput)
      .use(plugin)
      .use(ElementPlus)
      .use(ZiggyVue)
      .mount(el)
    },
    progress: {
        color: '#4B5563',
    },
})


