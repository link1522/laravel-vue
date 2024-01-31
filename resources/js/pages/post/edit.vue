<script setup lang="ts">
import Layout from '~/layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

interface PostForm {
    author: string;
    title: string;
    abstract: string;
    content: string;
}

const props = defineProps<{
    post: PostForm & { id: number };
    errors: Record<keyof PostForm, string>;
}>();

const form = useForm<PostForm>({
    author: props.post.author,
    title: props.post.title,
    abstract: props.post.abstract,
    content: props.post.content
});
</script>

<template>
    <Head>
        <title>edit post</title>
    </Head>
    <Layout>
        <h1 class="my-8 text-2xl">create post</h1>

        <form
            @submit.prevent="form.put($ziggyRoute('posts.update', post.id))"
            class="flex flex-col gap-4"
        >
            <label for="author">
                Author:
                <input v-model="form.author" id="author" type="text" />
            </label>
            <p class="text-red-600">{{ errors.author }}</p>

            <label for="title">
                Title:
                <input v-model="form.title" id="title" type="text" />
            </label>
            <p class="text-red-600">{{ errors.title }}</p>

            <label for="abstract">
                Abstract:
                <input v-model="form.abstract" id="abstract" type="text" />
            </label>
            <p class="text-red-600">{{ errors.abstract }}</p>

            <label for="content">
                Content:
                <textarea
                    v-model="form.content"
                    id="content"
                    cols="30"
                    rows="10"
                ></textarea>
            </label>
            <p class="text-red-600">{{ errors.content }}</p>

            <div class="flex gap-4 mx-2">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-green-700 px-2 py-1 rounded"
                >
                    Submit
                </button>
                <Link
                    :href="$ziggyRoute('posts.index')"
                    class="bg-gray-700 px-2 py-1 rounded"
                    >Cancel</Link
                >
            </div>
        </form>
    </Layout>
</template>
