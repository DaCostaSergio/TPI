<script>
export default{
    data () {
        return {
            card: null
        }
    },
    mounted () {
        console.log(axios
                .get('/api/playerCards')
                .then(response => (this.card = response.data)),
            console.log(this.data));
    }
}
</script>

<template>
    <div>
        <h1 class="text-white"> Ma valeur : {{card}} </h1>
    </div>
</template>
