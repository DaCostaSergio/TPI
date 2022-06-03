<script>

import axios from 'axios';


export default {
    data: () => {
        return {
            player: 'name',


        }
    },
    mounted() {
        axios.get('/current')
            .then(
                response => (this.player = response.data)

            )
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    }
}
</script>

<template>
    <div class="flex flex-wrap place-items-center ">
        <section class="relative mx-auto">
            <!-- navbar -->

            <div class="flex justify-between  w-screen">
                <div class="px-5 xl:px-12 py-6 flex w-full items-center ">
                    <h1 class="text-3xl text-goldcolor" >
                        {{player.name}}
                    </h1>
                    <!-- Nav Links -->
                    <div class="hidden lg:flex flex-end px-4 ml-auto font-semibold font-heading space-x-12 text-2xl text-goldcolor">
                        <h1>{{player.useCash}}</h1>
                        <h1>Règles</h1>
                        <h1>compte</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

