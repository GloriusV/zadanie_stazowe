
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import DropdownLink from '@/Components/DropdownLink.vue';;
 
const props = defineProps({
    klients: {
        type: Object,
        default: () => ({}),
    },
});

</script>
 
<template>
    <Head title="Klienci"/>
 
    <AuthenticatedLayout>
        <div class="">
            

            <table style="width:100%">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xl text-white">ID</th>
                    <th scope="col" class="px-6 py-3 text-center text-xl text-white">Imie</th>
                    <th scope="col" class="px-6 py-3 text-center text-xl text-white">Nazwisko</th>
                    <th scope="col" class="px-6 py-3 text-center text-xl text-white">Email</th>
                    <th scope="col" class="px-6 py-3 text-center text-xl text-white">Phone Number</th>
                    <th scope="col" class="px-6 py-3 text-center text-xl text-white">Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="klient in klients"
                    :key="klient.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">{{ klient.id }}</th>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">{{ klient.name }}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">{{ klient.surname }}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">{{ klient.email }}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">{{ klient.phone_number }}</td>
                    <td class="px-6 py-4 text-center">
                                            <Link :href="route('Klient.edit', klient.id)"
                                               class="px-3 py-2 w-50 text-white bg-green-600 rounded-lg float-left dark:hover:bg-green-500" >Edit</Link>
                                        
                        <DropdownLink as="button" onclick="return confirm('Are You Sure to delete this Klient?')" class="ml-5 px-3 py-2 text-white bg-red-700 rounded-lg float-left dark:hover:bg-red-600" :href="route('Klient.destroy', klient.id)" method="delete">

Delete
                        
                    </DropdownLink></td>
                </tr>

            </tbody>
            </table>
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-gray-200">
                       <div class="mb-2">
                            <Link :href="route('Klient.create')">
                                <PrimaryButton>Create New Klient</PrimaryButton></Link>
                                
                        </div>
                    </div>
                </div>
        </div>
    </AuthenticatedLayout>
</template>
