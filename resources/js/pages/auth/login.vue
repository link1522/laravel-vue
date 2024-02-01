<script setup lang="ts">
import Layout from '~/layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

interface LoginForm {
    email: string;
    password: string;
    remember: boolean;
}

defineProps<{
    errors: Record<keyof LoginForm, string>;
}>();

const loginForm = useForm<LoginForm>({
    email: '',
    password: '',
    remember: false
});
</script>

<template>
    <Head>
        <title>login</title>
    </Head>
    <Layout>
        <h1 class="mb-4 text-3xl">Login</h1>

        <form
            @submit.prevent="loginForm.post($ziggyRoute('login.post'))"
            class="flex flex-col gap-2"
        >
            <label for="email">
                Email:
                <input
                    v-model="loginForm.email"
                    type="email"
                    name=""
                    id="email"
                />
            </label>
            <p class="text-red-600">{{ errors.email }}</p>

            <label for="password">
                Password:
                <input
                    v-model="loginForm.password"
                    type="password"
                    id="password"
                />
            </label>
            <p class="text-red-600">{{ errors.password }}</p>

            <button
                type="submit"
                :disabled="loginForm.processing"
                class="bg-green-700 px-2 py-1 rounded self-start"
            >
                Submit
            </button>
        </form>
    </Layout>
</template>
