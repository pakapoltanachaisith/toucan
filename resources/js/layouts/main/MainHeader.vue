<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { HomeIcon, MenuIcon, PlusIcon } from 'lucide-vue-next';

import Container from '@/components/Container.vue';
import { Button } from '@/components/ui/button';
import { computed } from 'vue';
import HeaderLink from './HeaderLink.vue';
import HeaderMenu from './HeaderMenu.vue';

const page = usePage();
const auth = computed(() => page.props.auth);

const links = [
    {
        label: 'Home',
        href: '/posts',
        icon: HomeIcon,
        active: page.url === '/posts',
    },
    {
        label: 'Create post',
        href: '/posts/create',
        icon: PlusIcon,
        active: page.url === '/posts/create',
    },
];
</script>

<template>
    <Container as="header" class="flex items-center justify-between">
        <!-- Left -->
        <div>
            <Link class="flex items-center" href="/">
                <span
                    class="flex size-10 items-center justify-center rounded-xl bg-primary text-xl font-extrabold text-white"
                >
                    T
                </span>
                <span class="ml-4 hidden text-2xl font-medium lg:block"
                    >Toucan</span
                >
            </Link>
        </div>

        <!-- Right -->
        <div class="flex items-center">
            <nav class="hidden items-center space-x-4 lg:flex">
                <HeaderLink
                    v-for="link in links"
                    :key="link.href"
                    :label="link.label"
                    :href="link.href"
                    :icon="link.icon"
                    :active="link.active"
                />
            </nav>
            <div class="ml-10 flex items-center">
                <HeaderMenu v-if="auth.user" />
                <Button
                    @click="$emit('openSidebar')"
                    variant="outline"
                    size="icon"
                    class="ml-8 lg:hidden"
                >
                    <span class="sr-only">open sidebar</span>
                    <MenuIcon />
                </Button>
            </div>
        </div>
    </Container>
</template>
