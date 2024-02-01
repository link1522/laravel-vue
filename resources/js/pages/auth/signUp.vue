<script setup lang="ts">
import Layout from '~/layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

interface SignUpForm {
    name: string;
    email: string;
    password: string;
    password_confirmation: string;
}

defineProps<{
    errors: Record<keyof SignUpForm, string>;
}>();

const signUpForm = useForm<SignUpForm>({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});
</script>

<template>
    <Head>
        <title>sign up</title>
    </Head>
    <Layout>
        <h1 class="mb-4 text-3xl">Sign up</h1>

        <form
            @submit.prevent="signUpForm.post($ziggyRoute('signUp.post'))"
            class="flex flex-col gap-2"
        >
            <label for="name">
                Name:
                <input
                    v-model="signUpForm.name"
                    type="text"
                    name=""
                    id="name"
                />
            </label>
            <p class="text-red-600">{{ errors.name }}</p>

            <label for="email">
                Email:
                <input
                    v-model="signUpForm.email"
                    type="email"
                    name=""
                    id="email"
                />
            </label>
            <p class="text-red-600">{{ errors.email }}</p>

            <label for="password">
                Password:
                <input
                    v-model="signUpForm.password"
                    type="password"
                    id="password"
                />
            </label>
            <p class="text-red-600">{{ errors.password }}</p>

            <label for="password_confirmation">
                Password confirmation:
                <input
                    v-model="signUpForm.password_confirmation"
                    type="password"
                    id="password_confirmation"
                />
            </label>
            <p class="text-red-600">{{ errors.password_confirmation }}</p>

            <button
                type="submit"
                :disabled="signUpForm.processing"
                class="bg-green-700 px-2 py-1 rounded self-start"
            >
                Submit
            </button>
        </form>
    </Layout>
</template>
