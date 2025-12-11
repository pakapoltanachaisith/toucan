<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { HomeIcon, LogOutIcon, PlusIcon } from 'lucide-vue-next';
import { computed } from 'vue';

import { Avatar } from '@/components/ui/avatar';
import AvatarFallback from '@/components/ui/avatar/AvatarFallback.vue';
import { Button } from '@/components/ui/button';
import { Sheet, SheetContent } from '@/components/ui/sheet';
import { getInitials } from '@/composables/useInitials';
import { logout } from '@/routes';
import SidebarLink from './SidebarLink.vue';

withDefaults(defineProps<{ open: boolean }>(), { open: false });

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
    <Sheet :open="open" @update:open="$emit('close')">
        <SheetContent class="flex flex-col">
            <div class="px-4 py-6">
                <div class="flex items-center">
                    <span
                        class="flex size-10 items-center justify-center rounded-xl bg-primary text-xl font-extrabold text-white"
                    >
                        T
                    </span>
                    <span class="ml-4 text-2xl font-medium">Toucan</span>
                </div>
            </div>

            <nav class="space-y-1 px-6 py-6">
                <SidebarLink
                    v-for="link in links"
                    :label="link.label"
                    :href="link.href"
                    :icon="link.icon"
                    :active="link.active"
                />
            </nav>

            <div class="mt-auto flex items-center justify-between border-t p-4">
                <div class="flex items-center">
                    <Avatar>
                        <AvatarFallback>
                            {{ getInitials(auth.user.name) }}
                        </AvatarFallback>
                    </Avatar>
                    <p class="ml-4 font-medium">{{ auth.user.name }}</p>
                </div>
                <Button variant="outline" size="icon" asChild>
                    <Link :href="logout()">
                        <span class="sr-only">logout</span>
                        <LogOutIcon />
                    </Link>
                </Button>
            </div>
        </SheetContent>
    </Sheet>
</template>
