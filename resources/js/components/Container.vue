<script setup lang="ts">
withDefaults(
    defineProps<{
        as?: keyof HTMLElementTagNameMap;
    }>(),
    {
        as: 'div',
    },
);
</script>

<template>
    <component :is="as" class="mx-auto w-[90%] max-w-[90rem] px-4">
        <slot></slot>
    </component>
</template>
