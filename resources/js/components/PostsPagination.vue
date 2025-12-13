<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import {
    Pagination,
    PaginationContent,
    PaginationItem,
    PaginationNext,
    PaginationPrevious,
} from './ui/pagination';

import postRoutes from '@/routes/posts';

const props = defineProps<{
    currentPage: number;
    perPage: number;
    total: number;
}>();

const onPageChange = (value: number) => {
    router.visit(
        postRoutes.index({
            query: {
                page: value,
            },
        }),
    );
};
</script>

<template>
    <Pagination
        :page="currentPage"
        :itemsPerPage="perPage"
        :total="total"
        @update:page="onPageChange"
        v-slot="{ page }"
    >
        <PaginationContent v-slot="{ items }">
            <PaginationPrevious />

            <template v-for="(item, index) in items" :key="index">
                <PaginationItem
                    v-if="item.type === 'page'"
                    :value="item.value"
                    :isActive="item.value === page"
                >
                    {{ item.value }}
                </PaginationItem>
            </template>

            <PaginationNext />
        </PaginationContent>
    </Pagination>
</template>
