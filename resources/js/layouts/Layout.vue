<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage<{
    flush: {
        message: string;
    };
}>();

const checkExactClass = (componentName: string): string => {
    return page.component === componentName ? 'outline' : '';
};
</script>

<template>
    <div class="container">
        <nav class="flex gap-4 py-4 text-blue-400">
            <Link href="/" :class="checkExactClass('index')">home</Link>
            <Link
                :href="$ziggyRoute('page.about')"
                :class="checkExactClass('about')"
                >about</Link
            >
            <Link
                :href="$ziggyRoute('posts.index')"
                :class="checkExactClass('post/all')"
                >posts</Link
            >
            <Link
                :href="$ziggyRoute('login')"
                :class="checkExactClass('auth/login')"
                >login</Link
            >
            <Link
                :href="$ziggyRoute('signUp')"
                :class="checkExactClass('auth/signUp')"
                >sign up</Link
            >
            <Link :href="$ziggyRoute('logout')" method="delete">log out</Link>
        </nav>

        <main>
            <p v-if="page.props.flush.message" class="text-blue-600">
                {{ page.props.flush.message }}
            </p>
            <slot />
        </main>
    </div>
</template>
