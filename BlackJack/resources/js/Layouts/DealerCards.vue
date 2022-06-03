<script>
import axios from 'axios';


export default {
    data: () => {
        return {
            player: 'name',


        }
    },
    mounted() {
        axios.get('/dealerCards')
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
    <div class="text-white">
        {{cards.value}}
    </div>

</template>
