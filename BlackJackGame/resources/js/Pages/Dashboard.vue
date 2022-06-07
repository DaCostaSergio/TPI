<!--
Auteur : Sergio Da Costa
    Date : 03.06.2022
    Description: Travail Pratique Individuel (TPI)
    Page: DashBoard
--->

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia';
import  LinkToPub from '../Components/LinkToPub.vue'
/**
    Fonction post pour le pari
 **/
const getBet=()=>{
    Inertia.post('/bet', {
      action:"playerBet",

    }).then((response)=>{
       if(!response.ok)
       {
           console.log("erreur client");
           return;
       }
       window.location("/game");

    }).catch(error => console.log(error));

}
</script>

<!--
    template
--->
<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>""
        <div class="flex flex-col items-center mt-64">
            <div class="mt-40 text-3xl text-goldcolor">
                Nombre de Joueur en ligne :
            </div>
            <div class="mt-8 text-3xl text-goldcolor">
                Mise de départ : 20
            </div>

         <!--   <Link :href="route('game')">-->
            <button @click="getBet" class="w-80 h-24 text-3xl mt-10 mb-10 rounded-lg bg-goldcolor ">
                Miser et Jouer
            </button>
            <LinkToPub></LinkToPub>
         </div>
     </BreezeAuthenticatedLayout>

 </template>
