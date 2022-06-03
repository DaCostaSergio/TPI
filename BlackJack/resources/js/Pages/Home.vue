<script setup>


import { Head } from '@inertiajs/inertia-vue3';
import HeaderInfo from '../Layouts/HeaderInfo.vue';
import OnlinePlayer from "@/Components/OnlinePlayer";
import ButtonPetAndPlay from "@/Components/ButtonPetAndPlay";

import {Link} from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="BlackJack/Home" />

    <HeaderInfo></HeaderInfo>
    <!-- Main  Content -->

        <div class="flex flex-col items-center mt-40 text-9xl text-goldcolor font-Judson font-bold ">
            BLACKJACK
        </div>


    <div class="flex flex-col items-center mt-12 ">
        <div class="flex flex-col items-center mt-28 text-3xl font-sans">
            <!--Number of Online Players-->
            <div class="text-goldcolor">
                <OnlinePlayer/>
            </div>

            <!--Cash needed to play-->
            <div class="mt-4 text-goldcolor">
                Mise de départ : 20
            </div>
            <ButtonPetAndPlay/>
            <!--Bouton for Play-->
            <div class="mt-14">
                    <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor">

                        Miser et Jouer
                    </button>

            </div>

            <!-- Link to watch video-->
            <div class="mt-14 text-goldcolor">
                Regarder une vidéo pour obtenir 10
            </div>
        </div>
    </div>
    <!--Title-->



</template>
