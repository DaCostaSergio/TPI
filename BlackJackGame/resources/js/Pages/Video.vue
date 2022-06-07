

<script setup>

import {Link} from "@inertiajs/inertia-vue3";

</script>

<template>
    <div class=" text-9xl text-center font-Judson text-goldcolor">
        PHOTO DE PIXABAY
    </div>
        <div class=" mt-6 mx-auto ">
            <div class="flex flex-row items-center" >
                <div class="w-96  ml-2">
                    <img alt="image" src="../../assets/abstract-gf603c003d_1920.jpg">
                    <div class="text-white">
                        Auteur : steve_a_johnson
                    </div>
                </div>
                <div class="w-96  ml-2">
                    <img alt="image" src="../../assets/hd-wallpaper-g724c2fb46_1920.jpg">
                    <div class="text-white">
                        Auteur : ykaiavu
                    </div>
                </div>
                <div class="w-96  ml-2">
                    <img alt="image" src="../../assets/hd-wallpaper-g18134a044_1920.jpg">
                    <div class="text-white">
                        Auteur : sergiovisor_ph
                    </div>
                </div>
                <div class="w-96  ml-2">
                    <img alt="image" src="../../assets/windows-gad66a3e62_1920.jpg">
                    <div class="text-white">
                        Auteur : rotekirsche20
                    </div>
                </div>
            </div>
            <Link :href="route('dashboard')">
                <button  class="items-center w-80 h-24 text-3xl mt-10 mb-10 rounded-lg bg-goldcolor place-content-center">
                    Retourner au dashboard
                </button>
            </Link>
        </div>
    </template>



