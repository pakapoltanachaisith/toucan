<script setup lang="ts">
import { formatDistanceToNow } from 'date-fns';

import { getInitials } from '@/composables/useInitials';
import type { PostWithUser } from '@/pages/posts/index.vue';
import { Avatar, AvatarFallback } from './ui/avatar';

const props = defineProps<{
    posts: PostWithUser[];
}>();
</script>

<template>
    <div
        v-for="post in posts"
        :key="post.id"
        class="space-y-6 rounded-2xl bg-white p-6 shadow-sm outline-primary hover:outline"
    >
        <!-- Post header -->
        <div class="flex items-center">
            <div class="flex items-center">
                <Avatar class="size-12">
                    <AvatarFallback>{{
                        getInitials(post.user.name)
                    }}</AvatarFallback>
                </Avatar>
                <p class="ml-4 font-medium">{{ post.user.name }}</p>
            </div>
            <div class="ml-auto">
                <time
                    :datetime="post.created_at"
                    class="font-mono text-sm text-muted-foreground"
                    >{{ formatDistanceToNow(post.created_at) }}</time
                >
            </div>
        </div>

        <!-- Post content -->
        <div>
            <p class="text-pretty">{{ post.title }}</p>
            <p
                v-if="post?.content"
                class="mt-3 text-pretty text-muted-foreground"
            >
                {{ post.content }}
            </p>
        </div>
    </div>
</template>
