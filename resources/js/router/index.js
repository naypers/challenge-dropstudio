import { createRouter, createWebHistory } from 'vue-router'

import ProductsCreate from '../components/products/ProductsCreate.vue'

const routes = [
    {
        path: '/products/create',
        name: 'products.create',
        component: ProductsCreate
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})