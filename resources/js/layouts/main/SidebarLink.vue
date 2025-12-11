<script setup lang="ts">
import { LucideIcon } from 'lucide-vue-next';

defineProps<{
    label: string;
    href: string;
    icon?: LucideIcon;
    active: boolean;
}>();
</script>

<template>
    <Link
        :href="href"
        class="group flex items-center rounded-xl p-3 transition duration-300 hover:bg-stone-200 hover:text-primary"
        :class="{
            'bg-stone-200 text-black': active,
        }"
    >
        <icon class="mr-6 text-stone-600 group-hover:text-primary" />
        <span class="text-lg font-bold text-stone-600 group-hover:text-primary">
            {{ label }}
        </span>
    </Link>
</template>
