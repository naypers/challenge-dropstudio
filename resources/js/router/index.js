import { createRouter, createWebHistory } from 'vue-router'

import ProductsIndex from '../components/products/ProductsIndex.vue'
import ProductsCreate from '../components/products/ProductsCreate.vue'

import ProductsEdit from '../components/products/ProductsEdit.vue'
import ProductsShow from '../components/products/ProductsShow.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'products.index',
        component: ProductsIndex
    },
    {
        path: '/products/create',
        name: 'products.create',
        component: ProductsCreate
    },
    {
        path: '/products/:id/edit',
        name: 'products.edit',
        component: ProductsEdit,
        props: true
    },
    {
        path: '/products/:id/show',
        name: 'products.show',
        component: ProductsShow,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})