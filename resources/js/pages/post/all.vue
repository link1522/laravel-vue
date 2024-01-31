<script setup lang="ts">
import Layout from '~/layouts/Layout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

interface Post {
    id: number;
    author: string;
    title: string;
    abstract: string;
    content: string;
}

defineProps<{
    posts: Post[];
}>();

const destroy = (id: number) => {
    if (confirm('Are you sure?')) {
        router.delete(ziggyRoute('posts.destroy', id));
    }
};
</script>

<template>
    <Head>
        <title>all posts</title>
    </Head>
    <Layout>
        <h1 class="my-8 text-2xl">All Post</h1>
        <div class="mb-4">
            <Link
                :href="$ziggyRoute('posts.create')"
                class="bg-green-700 px-4 py-2 rounded"
                >add a new post</Link
            >
        </div>
        <div class="grid gap-6">
            <div v-for="post in posts">
                <h3 class="text-xl">{{ post.title }}</h3>
                <p>{{ post.abstract }}</p>

                <hr class="border-gray-300" />
                <p>{{ post.content }}</p>

                <div class="flex gap-4 my-2">
                    <Link
                        :href="$ziggyRoute('posts.edit', post.id)"
                        class="bg-blue-600 text-white rounded px-4"
                    >
                        Edit
                    </Link>
                    <button
                        @click="destroy(post.id)"
                        class="bg-red-600 text-white rounded px-4"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </Layout>
</template>
