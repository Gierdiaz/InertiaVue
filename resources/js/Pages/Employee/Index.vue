<template>
    <div class="container mx-auto pt-5">
        <div class="flex justify-end mb-4">
            <Link :href="`/employees/create`" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Criar Novo Funcionário
            </Link>
        </div>
        <table class="min-w-full bg-white shadow-md rounded overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">Nome</th>
                    <th class="py-2 px-4">Endereço</th>
                    <th class="py-2 px-4">Telefone</th>
                    <th class="py-2 px-4">Ações</th> 
                </tr>
            </thead>
            <tbody>
                <tr v-for="employee in employees.data" :key="employee.id" class="border-t hover:bg-gray-100">
                    <td class="py-2 px-4">{{ employee.name }}</td>
                    <td class="py-2 px-4">{{ employee.address }}</td>
                    <td class="py-2 px-4">{{ employee.phone }}</td>
                    <td class="py-2 px-4">
                        <Link :href="`/employees/show/${employee.id}`" class="text-blue-500 hover:text-blue-700 mr-2">Ver</Link>
                        <Link :href="`/employees/edit/${employee.id}`" class="text-green-500 hover:text-green-700 mr-2">Editar</Link>
                        <Link :href="`/employees/delete/${employee.id}`" method="DELETE" class="text-red-500 hover:text-red-700 mr-2">Excluir</Link>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    employees: Array,
    required: true
});
</script>

