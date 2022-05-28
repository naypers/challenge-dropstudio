<template>

    <div class="space-y-4 rounded-md shadow-sm">

        <table class="table-products">
            <tr>
                <td class="table-s1">
                    <img src="http://127.0.0.1:8000/img/product.jpeg" width="240" /> 
                </td>

                <td class="table-s2">
                    <strong>{{ product.name }}</strong>  
                    <span class="text-sku">(sku{{ product.sku }})</span>
                        <br /><br />
                    Categoria: {{ product.category }}
                        <br /><br />
                    <div v-if="product.rating > 0">
                        <img src="/img/star.png" width="20" style="display: inline" /> 
                            &nbsp;
                        <strong>{{ product.rating }}</strong>
                        <span class="text-grey"> ({{ product.num_rating }} Calificaciones)</span>
                            <br />
                        {{ product.amount }} disponibles
                    </div>
                    <div v-else>
                        <img src="/img/star.png" width="20" style="display: inline" /> 
                            &nbsp;
                        Aun no cuenta con calificaciones
                    </div>
                        <br />
                    Descripción: {{ product.description }}
                        <br /><br />
                    <strong>Precio: ${{ product.price }}</strong>
                        <br /><br />
                    <div v-if="product.status == 1" align="left">
                        <div class="pill-available">
                            Disponible ({{ product.amount }})
                        </div>
                    </div>
                    <div v-else align="left">
                        <div class="pill-no-available">
                            No disponible
                        </div>
                    </div>
                </td>
            </tr>
        </table>        
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