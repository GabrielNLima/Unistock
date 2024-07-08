// import forms from "@tailwindcss/forms";
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite/**/*.js"

    ],
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            primary: colors.emerald,
            danger: colors.red[700],
            sucess: colors.green[600]
        },
        extend: {},
    },
    plugins: [require('flowbite/plugin')],
    darkMode: 'class',
}

