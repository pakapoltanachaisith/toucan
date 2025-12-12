<script setup lang="ts">
import PostsFeed from '@/components/PostsFeed.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import type { Post, User } from '@/types';

export interface PostWithUser extends Post {
    user: Pick<User, 'id' | 'name'>;
}

const props = defineProps<{
    posts: PostWithUser[];
}>();
</script>

<template>
    <MainLayout title="Posts">
        <div class="mb-12">
            <h1 class="text-2xl font-bold">Posts</h1>
        </div>

        <div class="space-y-6">
            <PostsFeed :posts="posts" />
        </div>
    </MainLayout>
</template>
