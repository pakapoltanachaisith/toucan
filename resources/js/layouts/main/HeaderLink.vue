<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { LucideIcon } from 'lucide-vue-next';

import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from '@/components/ui/tooltip';

defineProps<{
    label: string;
    href: string;
    icon: LucideIcon;
    active?: boolean;
}>();
</script>

<template>
    <TooltipProvider>
        <Tooltip>
            <TooltipTrigger asChild>
                <Link
                    :href="href"
                    class="rounded-xl p-1.5 transition duration-300 hover:bg-stone-200 hover:text-primary"
                    :class="{
                        'bg-stone-200 text-primary': active,
                    }"
                >
                    <span class="sr-only">{{ label }}</span>
                    <icon class="size-5 text-stone-600" />
                </Link>
            </TooltipTrigger>
            <TooltipContent>{{ label }}</TooltipContent>
        </Tooltip>
    </TooltipProvider>
</template>
