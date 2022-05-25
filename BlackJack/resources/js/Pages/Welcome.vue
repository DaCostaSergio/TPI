<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Title from '../Components/Title.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    canGuest: Boolean,
})
</script>

<template>
    <div class=" flex-col items-top justify-center min-h-screen bg-darkbg  sm:items-center sm:pt-0">
        <div class="flex flex-col justify-center  mt-4 sm:items-center sm:justify-between">
        <Title class="text-center my-28"/>

            <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor">
                <Link :href="route('login')" class="text-4xl text-darkbg font-Judson font-bold">
                    Se connecter
                </Link>
            </button>

            <button class="w-80 h-24 mt-10 mb-10 rounded-lg bg-goldcolor">
                <Link v-if="canRegister" :href="route('register')" class="text-4xl text-darkbg font-Judson font-bold">
                    S'enregistrer
                </Link>
            </button>

            <button class="w-80 h-24 mt-10 rounded-lg bg-goldcolor">
                <Link v-if="canGuest" :href="route('guest')" class="text-5xl text-darkbg">
                    Invité
                </Link>
            </button>

        </div>

        <div v-if="canLogin || canGuest" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                    Dashboard
                </Link>
        </div>

    </div>

    <Head title="Welcome" />
</template>


