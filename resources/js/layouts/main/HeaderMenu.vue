<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { LogOutIcon } from 'lucide-vue-next';

import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { getInitials } from '@/composables/useInitials';
import { logout } from '@/routes';
import { computed } from 'vue';

const page = usePage();
const auth = computed(() => page.props.auth);

const initials = getInitials(auth.value.user.name);
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger>
            <Avatar>
                <AvatarFallback>{{ initials }}</AvatarFallback>
            </Avatar>
        </DropdownMenuTrigger>
        <DropdownMenuContent>
            <DropdownMenuLabel>{{ auth.user.name }}</DropdownMenuLabel>
            <DropdownMenuSeparator />
            <DropdownMenuItem asChild>
                <Link :href="logout()" class="w-full">
                    <LogOutIcon class="mr-2 size-4" />
                    Logout
                </Link>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
