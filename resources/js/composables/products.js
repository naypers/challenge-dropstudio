import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useProducts() {
    const product = ref([])
    const products = ref([])

    const errors = ref('')
    const router = useRouter()

    const storeProduct = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/products', data)
            await router.push({ name: 'products.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }

    return {
        errors,
        product,
        products,
        storeProduct
    }
}