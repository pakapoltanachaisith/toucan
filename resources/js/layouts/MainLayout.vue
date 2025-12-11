<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

import Container from '@/components/Container.vue';
import MainHeader from './main/MainHeader.vue';
import MainSidebar from './main/MainSidebar.vue';

defineProps<{
    title?: string;
}>();

const showSidebar = ref(false);
</script>

<template>
    <Head :title="title" />

    <div class="fixed inset-x-0 top-0 z-10 border-b bg-background py-4">
        <MainHeader @openSidebar="showSidebar = true" />
    </div>

    <MainSidebar :open="showSidebar" @close="showSidebar = false" />

    <Container as="main" class="mt-28">
        <slot></slot>
    </Container>
</template>
