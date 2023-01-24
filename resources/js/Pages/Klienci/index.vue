<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
 
const form = useForm({
    message: '',
});
</script>
 
<template>
    <Head title="Klienci"/>
 
    <AuthenticatedLayout>
        <div class="">

            <table style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user=>id }}</th>
                    <td>{{ $user=>name }}</td>
                    <td>Jackson</td>
                    <td>95</td>
                    <td>Eve</td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>