//assets/app.js
import { createInertiaApp } from '@inertiajs/inertia-vue'
import Vue from "vue";

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, app, props }) {
        new Vue({
            render: h => h(app, props),
        }).$mount(el)
    },
})
