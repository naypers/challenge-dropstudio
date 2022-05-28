require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import ProductsIndex from './components/products/ProductsIndex.vue';

createApp({
    components: {
        ProductsIndex
    }
}).use(router).mount('#app')