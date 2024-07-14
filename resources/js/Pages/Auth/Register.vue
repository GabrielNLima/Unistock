<template>
    <Navbar/>
            <div class="flex flex-col items-center justify-top px-6 py-8 mx-auto md:h-screen lg:py-0 m-32">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-14 h-14" :src="'git /images/Logo_PNG.png'">
                    Unistock
                </a>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white flex flex-col items-center justify-center">Register</h1>
                        <form @submit.prevent="form.post('/register');" class="space-y-4 md:space-y-6">
                            <div>
                                <span v-if="form.errors.id" class="text-danger" v-text="form.errors.id"></span>
                                <label for="idUsuario"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                <input type="text" name="idUsuario" v-model="form.idUsuario"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="ID"/>
                            </div>
                            <div>
                                <span v-if="form.errors.password" class="text text-danger" v-text="form.errors.password"></span>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                                <input type="password" name="password" placeholder="••••••••" v-model="form.password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                            </div>
                            <div class="flex items-center justify-between">
                                <!-- <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                            required="" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 dark:text-gray-300">Remember
                                            me</label>
                                    </div>
                                </div> -->
                                <!-- <a href="#"
                                    class="text-sm font-medium text-primary-500 hover:underline dark:text-primary-500">Esqueceu sua Senha?</a> -->
                            </div>
                            <button type="submit" :disabled="form.processing"
                                class="w-full text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Registre-se
                            </button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Já tem uma Conta?
                                <Link href="/"
                                    class="font-medium text-primary-500 hover:underline dark:text-primary-500">Faça o Login</Link>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

</template>

<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import { Link, useForm } from "@inertiajs/vue3";
import Navbar from "../../Shared/Navbar.vue";

const form = useForm({
    idUsuario: null,
    password: null,
});


onMounted(() => {
    initFlowbite();
});

</script>

<style lang="scss" scoped>

</style>
