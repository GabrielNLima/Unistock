<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <html class="dark">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <Link href="/" class="flex justify-between">
                    <ApplicationLogo class="w-16 h-16 fill-current text-gray-500" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Unistock</span>
                </Link>
            </div>

            <div
                class="w-full sm:max-w-md px-7 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
            >
                <slot />
            </div>
        </div>
    </html>
</template>
