<template>
    <h1>Ver Producto</h1>
    <br />

    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>


    <div class="space-y-4 rounded-md shadow-sm">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <div class="mt-1">
                <input type="text" name="name" id="name"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.name" disabled>
            </div>
        </div>
        <br />

        <div>
            <label for="sku" class="block text-sm font-medium text-gray-700">Sku</label>
            <div class="mt-1">
                <input type="text" name="sku" id="sku"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.sku" disabled>
            </div>
        </div>
        <br />

        <div>
            <label for="id_category" class="block text-sm font-medium text-gray-700">Categoría</label>
            <div class="mt-1">
                <input type="text" name="id_category" id="id_category"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.id_category" disabled>
            </div>
        </div>
        <br />

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <div class="mt-1">
                <textarea name="description" id="description"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.description" disabled></textarea>
            </div>
        </div>
        <br />

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
            <div class="mt-1">
                <input type="text" name="price" id="price"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.price" disabled>
            </div>
        </div>
        <br />

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <div class="mt-1">
                <input type="text" name="amount" id="amount"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.amount" disabled>
            </div>
        </div>
        <br />

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Estatus</label>
            <div class="mt-1">
                <input type="text" name="status" id="status"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="product.status" disabled>
            </div>
        </div>
    </div>

    <br />

    <a @click="$router.go(-1)" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">Regresar</a>

</template>

<script>
import useProducts from '../../composables/products'
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, product, updateProduct, getProduct } = useProducts()

        onMounted(() => getProduct(props.id))

        return {
            errors,
            product
        }
    }
}
</script>