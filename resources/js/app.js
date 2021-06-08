require('./bootstrap');
require('./components');

import Vue from 'vue';
import { BootstrapVue, IconsPlugin, BVToastPlugin } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(BVToastPlugin)

new Vue({
    el: '#root',
})