<script setup>
import {Inertia} from "@inertiajs/inertia";

const getPub=()=>{
    Inertia.post('/pub', {
        action:"getCash",

    }).then((response)=>{
        if(!response.ok)
        {
            console.log("erreur client");
            return;
        }


    }).catch(error => console.log(error));

}
</script>

<template>
    <div>
        <button @click="getPub" class="text-goldcolor text-3xl underline underline-offset-8">
            Regarder une vidéo pour obtenir 20 Pièces
        </button>
    </div>

</template>
