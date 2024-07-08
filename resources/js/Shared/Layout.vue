<template>
<html class="dark">
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navbar -->
        <Navbar/>
        <!-- End -->

        <!-- Sidebar -->
        <Sidebar/>
        <!-- End -->

        <main class="p-4 md:ml-64 h-auto pt-20">
            <slot/>
        </main>
    </div>
</html>
</template>

<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Navbar from "./Navbar.vue";
import Sidebar from "./Sidebar.vue";
// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite();
});

// On page load or when changing themes, best to add inline in `head` to avoid FOUC


// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

</script>


<style lang="scss" scoped></style>
