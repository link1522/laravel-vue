<script setup lang="ts">
import Layout from '~/layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

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
</script>

<template>
    <Head>
        <title>all posts</title>
    </Head>
    <Layout>
        <h1 class="my-8 text-2xl">All Post</h1>
        <div v-for="post in posts">
            <h3 class="text-xl">{{ post.title }}</h3>
            <p>{{ post.abstract }}</p>

            <hr />
            <p>{{ post.content }}</p>
        </div>
    </Layout>
</template>
