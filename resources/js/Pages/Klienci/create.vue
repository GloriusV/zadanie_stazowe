
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link, Head} from "@inertiajs/vue3";

const props = defineProps({
    klients: {
        type: Object,
        default: () => ({}),
    },
});


const form = useForm({
    name: '',
    surname: '',
    email: '',
    phone_number: '',
    
});

const submit = () => {
    form.post(route("Klient.store"));
};

</script>

<template>
    <Head title="Klient Create" />

    <AuthenticatedLayout>
        <template>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Klient Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="name"
                                    class="block mb-2 text-xl text-black dark:text-black"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="surname"
                                    class="block mb-2 text-xl text-black dark:text-black"
                                    >surname</label
                                >
                                <input
                                    type="text"
                                    v-model="form.surname"
                                    name="surname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.surname"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.surname }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="email"
                                    class="block mb-2 text-xl text-black dark:text-black"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    v-model="form.email"
                                    name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                />

                                <div
                                    v-if="form.errors.email"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="phone_number"
                                    class="block mb-2 text-xl text-black dark:text-black"
                                    >Phone Number</label
                                >
                                <input
                                    type="text"
                                    v-model="form.phone_number"
                                    name="phone_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.phone_number"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.phone_number }}
                                </div>
                                </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                               Create
                            </button>
                            <Link :href="route('Klient.index')">
                            <button
                                type="cancel"
                                class="text-white bg-red-700 ml-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                               Cancel
                            </button></Link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>