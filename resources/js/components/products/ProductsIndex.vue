<template>

    <div class="flex place-content-end mb-4">
        <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            <router-link :to="{ name: 'products.create' }" class="text-sm font-medium">Crear Producto</router-link>
        </div>
    </div>

    <template v-for="item in products" :key="item.id">
        <table class="table-products">
            <tr>
                <td class="table-p1">
                    <img src="img/product.jpeg" width="140" /> 
                </td>
                <td class="table-p2">
                    <strong>{{ item.name }}</strong>  
                    <span class="text-sku">(sku{{ item.sku }})</span>
                        <br />
                    Categoria: {{ item.category }}
                        <br />
                    <div v-if="item.rating > 0">
                        <img src="/img/star.png" width="20" style="display: inline" /> 
                            &nbsp;
                        <strong>{{ item.rating }}</strong>
                        <span class="text-grey"> ({{ item.num_rating }} Calificaciones)</span>
                    </div>
                    <div v-else>
                        <img src="/img/star.png" width="20" style="display: inline" /> 
                            &nbsp;
                        Aun no cuenta con calificaciones
                    </div>
                </td>
                <td class="table-p3">
                    <strong>Precio: ${{ item.price }}</strong>

                    <div class="separator"></div>

                    <div v-if="item.status == 1" align="center">
                        <div class="pill-available">
                            Disponible ({{ item.amount }})
                        </div>
                    </div>
                    <div v-else align="center">
                        <div class="pill-no-available">
                            No disponible
                        </div>
                    </div>

                    <div class="separator-20"></div>

                    <router-link :to="{ name: 'products.show', params: { id: item.id } }"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">Ver</router-link>

                        &nbsp;

                    <router-link :to="{ name: 'products.edit', params: { id: item.id } }"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">Editar</router-link>

                        &nbsp;

                    <button @click="deleteProduct(item.id)"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Eliminar</button>

                    <div class="separator-20"></div>

                    <select id="rate">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>

                    <button @click="rateProduct(item.id)"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest disabled:opacity-25 transition ease-in-out duration-150">
                        Calificar</button>  

                </td>
            </tr>
        </table>
        <br />
    </template>
</template>

<script>
import useProducts from '../../composables/products'
import { onMounted } from 'vue';

export default {
    setup() {
        const { products, getProducts, destroyProduct, qualifyProduct } = useProducts()

        const deleteProduct = async (id) => {
            if (!window.confirm('¿Seguro que quieres eliminar este producto?')) {
                return
            }

            await destroyProduct(id)
            await getProducts()
        }
 
        const rateProduct = async (id) => {
            await qualifyProduct(id)
            await getProducts()
        }

        onMounted(getProducts)

        return {
            products,
            deleteProduct,
            rateProduct
        }
    }
}
</script>