<script setup lang="ts">
import Layout from '~/layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    author: '',
    title: '',
    abstract: '',
    content: ''
});
</script>

<template>
    <Head>
        <title>new post</title>
    </Head>
    <Layout>
        <h1 class="my-8 text-2xl">create post</h1>

        <form
            @submit.prevent="form.post($route('posts.store'))"
            class="flex flex-col gap-4"
        >
            <label for="author">
                Author:
                <input v-model="form.author" id="author" type="text" />
            </label>
            <label for="title">
                Title:
                <input v-model="form.title" id="title" type="text" />
            </label>
            <label for="abstract">
                Abstract:
                <input v-model="form.abstract" id="abstract" type="text" />
            </label>
            <label for="content">
                Content:
                <textarea
                    v-model="form.content"
                    id="content"
                    cols="30"
                    rows="10"
                ></textarea>
            </label>

            <div class="flex gap-4 mx-2">
                <button type="submit" class="bg-green-700 px-2 py-1 rounded">
                    Submit
                </button>
                <Link
                    :href="$route('posts.index')"
                    class="bg-gray-700 px-2 py-1 rounded"
                    >Cancel</Link
                >
            </div>
        </form>
    </Layout>
</template>
