<script setup lang="ts">
import PostsFeed from '@/components/PostsFeed.vue';
import PostsPagination from '@/components/PostsPagination.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import type { Post, User } from '@/types';

export interface PostWithUser extends Post {
    user: Pick<User, 'id' | 'name'>;
}

const props = defineProps<{
    posts: PostWithUser[];
    currentPage: number;
    perPage: number;
    totalPosts: number;
}>();
</script>

<template>
    <MainLayout title="Posts">
        <div class="mb-12">
            <h1 class="text-2xl font-bold">Posts</h1>
        </div>

        <div class="mx-auto max-w-2xl space-y-6">
            <PostsFeed :posts="posts" />
        </div>

        <div class="py-20">
            <PostsPagination
                :currentPage="currentPage"
                :perPage="perPage"
                :total="totalPosts"
            />
        </div>
    </MainLayout>
</template>
