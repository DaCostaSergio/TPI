<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Home from '@/Layouts/Home.vue';

import { Head } from '@inertiajs/inertia-vue3';
import Title from '../Components/Title.vue';
</script>


<template>

    <div class="bg-black">
        <Head title="Dashboard" />

            <BreezeAuthenticatedLayout>
              <Title class="text-center my-28"/>
            </BreezeAuthenticatedLayout>
    </div>

</template>
