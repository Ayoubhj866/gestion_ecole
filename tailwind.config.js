import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {


                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'white': '#ffffff',
                    'purple': '#3f3cbb',
                    'midnight': '#121063',
                    'metal': '#565584',
                    'tahiti': '#3ab7bf',
                    'silver': '#ecebff',
                    'bubble-gum': '#ff77e9',
                    'bermuda': colors.blue,
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms ,  require('flowbite/plugin') ],
};
