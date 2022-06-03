<script>
import axios from 'axios';

export default {
    data: () => {
        return {
            player: '',
        }
    },
    methods: {
        redirect(event) {
            window.location.href = route("game");
        }
    },
    mounted() {
        console.log("ok");

        axios.get('api/start')
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
    <div class="mt-14">
        <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor" @click="redirect">
            Miser et Jouer
        </button>
    </div>

</template>
