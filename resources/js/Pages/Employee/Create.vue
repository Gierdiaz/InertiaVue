<template>
    <div class="container mx-auto pt-5">
        <div class="bg-white shadow-md rounded overflow-hidden">
            <div class="p-4">
                <h1 class="text-xl font-bold mb-4">Criar Novo Funcionário</h1>
                <form @submit.prevent="form.post(`/employees`)">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nome:</label>
                        <input v-model="form.name" type="text" id="name" class="w-full p-2 border rounded" />
                        <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</span>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Endereço:</label>
                        <input v-model="form.address" type="text" id="address" class="w-full p-2 border rounded" />
                        <span v-if="errors.address" class="text-red-500 text-sm">{{ errors.address }}</span>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Telefone:</label>
                        <input v-model="form.phone" type="text" id="phone" class="w-full p-2 border rounded" />
                        <span v-if="errors.phone" class="text-red-500 text-sm">{{ errors.phone }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Criar</button>
                        <Link :href="`/employees`" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            Voltar
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

const { props } = usePage();
const errors = ref(props.errors || {});


const form = useForm({
    name: null,
    address: null,
    phone: null
});

</script>
