import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0', transform: 'scale(0.8)' },
                    '25%': { opacity: '0.25', transform: 'scale(0.85)' },
                    '50%': { opacity: '0.5', transform: 'scale(0.9)' },
                    '75%': { opacity: '0.75', transform: 'scale(0.95)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                fadeOut: {
                    '0%': { opacity: '1', transform: 'scale(1)' },
                    '50%': { opacity: '0.5', transform: 'scale(1)' },
                    '100%': { opacity: '0', transform: 'scale(0.95)' },
                },
                zoomIn: {
                    '0%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.1)' },
                    '100%': { transform: 'scale(1.2)' },
                },
            },
            animation: {
                fadeIn: 'fadeIn var(--fadeIn-duration) ease-in forwards',
                fadeOut: 'fadeOut var(--fadeOut-duration, 0.5s) ease-out forwards',
                zoomIn: 'zoomIn 0.2s forwards'
            },
        },
    },
    plugins: [],
};
