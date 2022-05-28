require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import ProductsCreate from './components/products/ProductsCreate.vue';

createApp({
    components: {
        ProductsCreate
    }
}).use(router).mount('#app')