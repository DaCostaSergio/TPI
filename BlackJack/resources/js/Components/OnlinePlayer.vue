<script>

import axios from 'axios';


export default {
    data: () => {
        return {
            player: '',
        }
    },
    mounted() {
        axios.get('api/players/count')
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
    Joueur en ligne :{{player}}
</template>
