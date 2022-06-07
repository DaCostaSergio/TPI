<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Welcome" />

    <div class="flex flex-col items-center mt-28 text-3xl font-sans">
        <div class="mt-4 sm:items-center sm:justify-between">
            <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                    Dashboard
                </Link>

                <template v-else >
                    <div class="flex flex-col items-center">
                            <div class=" mt-30 text-9xl text-goldcolor font-Judson font-bold mb-20">
                                BLACKJACK
                            </div>
                            <div class=" mt-14">
                                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                                    <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor font-Judson font-bold  text-darkbg">
                                        Log in
                                    </button>
                                </Link>

                                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                                    <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor font-Judson font-bold  text-darkbg">
                                        Register
                                    </button>
                                </Link>
                            </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>


