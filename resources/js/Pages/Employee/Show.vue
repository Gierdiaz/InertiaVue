<template>
    <div class="container mx-auto pt-5">
        <div class="bg-white shadow-md rounded overflow-hidden">
            <div class="p-4">
                <h1 class="text-xl font-bold mb-4">Detalhes do Funcionário</h1>
                <div class="mb-4">
                    <strong class="font-semibold">Nome:</strong> {{ employee.name }}
                </div>
                <div class="mb-4">
                    <strong class="font-semibold">Endereço:</strong> {{ employee.address }}
                </div>
                <div class="mb-4">
                    <strong class="font-semibold">Telefone:</strong> {{ employee.phone }}
                </div>
                <div>
                    <Link :href="`/employees/${employee.id}/edit`" class="text-blue-500 hover:text-blue-700 mr-2">Editar</Link>
                    <button @click="deleteEmployee" class="text-red-500 hover:text-red-700">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"
import { defineProps } from "vue";

defineProps({
    employee: Object
})

</script>