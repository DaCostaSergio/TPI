<script setup>
import { ref } from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-darkbg">
            <nav class="bg-darkbg ">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex mt-2">
                            <div class="text-goldcolor mr-2">
                                <BreezeDropdown>
                                    <template #trigger>
                                        <div class="inline-flex items-center">
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class=" px-3 py-2 border border-transparent text-sm text-goldcolor leading-4 font-medium rounded-md text-gray-500 bg-darkbg hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 text-2xl">
                                                    Règles
                                                </button>
                                            </span>
                                        </div>
                                    </template>
                                    <template #content>
                                        <div class="text-darkbg p-10">
                                        L’objectif est de tirer des cartes afin d’attendre le nombre maximal 21 sans le
                                        dépasser. Si c’est le cas, le joueur a perdu instantanément.
                                        Si le joueur obtient un score plus élevé que le coursier, alors il gagne la partie.
                                        Pour obtenir le nommer BlackJack, il faut obtenir un As et une bûche
                                        (10, Valet, Dame ou Roi). Il est important de savoir que le coursier est arrête
                                        de tirer des cartes s’il a obtenu le score de 16 ou plus avec la deuxième carte. <br>

                                        Valeur des cartes : <br>
                                        2 à 9 = valeur nominal<br>
                                        10 au roi = 10 points<br>
                                        As = 1 ou 11 point <br>
                                        </div>
                                    </template>

                                </BreezeDropdown>
                            </div>
                            <div class="text-goldcolor mt-1 text-2xl">
                                {{ $page.props.auth.user.cash }}
                            </div>
                        </div>
                        <!-- Logo -->
                        <div class=" mt-40">
                            <Link :href="route('dashboard')">
                                <BreezeApplicationLogo class="block h-9 w-auto" />
                            </Link>
                        </div>
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <div class="inline-flex items-center">
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class=" px-3 py-2 border border-transparent text-2xl text-goldcolor leading-4 font-medium rounded-md text-gray-500 bg-darkbg hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                    {{ $page.props.auth.user.name }}
                                                </button>
                                            </span>
                                        </div>
                                    </template>

                                    <template #content>

                                        <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                            Se déconnecter
                                        </BreezeDropdownLink>


                                    </template>
                                </BreezeDropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">

                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Se déconnecter
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />

                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />

            </main>
        </div>
    </div>
</template>
