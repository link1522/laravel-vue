<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage<{
    flush: {
        message: string;
    };
    user: {
        name: string;
        email: string;
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
                v-if="!page.props.user.email"
                :href="$ziggyRoute('login')"
                :class="checkExactClass('auth/login')"
                class="ml-auto"
                >login</Link
            >
            <Link
                v-if="!page.props.user.email"
                :href="$ziggyRoute('signUp')"
                :class="checkExactClass('auth/signUp')"
                >sign up</Link
            >
            <Link
                v-if="page.props.user.email"
                :href="$ziggyRoute('logout')"
                class="ml-auto"
                method="delete"
                as="button"
                >log out</Link
            >
        </nav>

        <h2 v-if="page.props.user.name">hello, {{ page.props.user.name }} !</h2>

        <main>
            <p v-if="page.props.flush.message" class="text-blue-600">
                {{ page.props.flush.message }}
            </p>
            <slot />
        </main>
    </div>
</template>
