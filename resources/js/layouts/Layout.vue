<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

const checkExactClass = (componentName: string): string => {
    return page.component === componentName ? 'outline' : '';
};
</script>

<template>
    <div class="container">
        <nav class="flex gap-4 py-4 text-blue-400">
            <Link href="/" :class="checkExactClass('index')">home</Link>
            <Link :href="$route('page.about')" :class="checkExactClass('about')"
                >about</Link
            >
            <Link
                :href="$route('posts.index')"
                :class="checkExactClass('post/all')"
                >posts</Link
            >
        </nav>

        <main>
            <slot />
        </main>
    </div>
</template>
