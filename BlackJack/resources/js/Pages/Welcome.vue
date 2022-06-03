<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import {onMounted} from "vue";
import axios from "axios"

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

onMounted(async () => {
    /* let response = await fetch("/api/test")


    console.log(response.json)*/
    axios
        .get('/api/start')
        .then(response => (this.info = response))

})


</script>

<template>
    <Head title="BlackJack"/>
    <!--Title-->
    <div class="flex flex-col items-center mt-40 text-9xl text-goldcolor font-Judson font-bold ">
        BLACKJACK
    </div>

    <div class="flex flex-col items-center mt-28 text-3xl font-sans">

        <div class="  mt-4 sm:items-center sm:justify-between">
            <div v-if="canLogin">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')">
                DashBoard
                </Link>

                <template v-else>
                    <div class="flex flex-col items-center mt-14 ">

                        <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor font-Judson font-bold  text-darkbg">
                            <Link :href="route('login')">
                                Log in
                            </Link>
                        </button>
                        <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor font-Judson font-bold text-darkbg">
                            <Link v-if="canRegister" :href="route('register')">
                                Register
                            </Link>
                        </button>
                        <button class="w-80 h-24 mb-10 rounded-lg bg-goldcolor font-Judson font-bold text-darkbg">
                            <Link v-if="canRegister" :href="route('register')">
                                Guest
                            </Link>
                        </button>

                    </div>
                </template>
            </div>
        </div>
    </div>
</template>


