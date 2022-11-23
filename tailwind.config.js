const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sans: ['Poppins', 'Nunito', ...defaultTheme.fontFamily.sans],
            },
            gridTemplateColumns: {
                dashboard_widget: 'repeat(auto-fit, minmax(300px, 1fr))',
            },
            colors: {
                'primary': '#00bcd4',
                'primary-dark': '#00acc2',
                'primary-light': '#00e5ff',
                'secondary': '#ff9800',
                'secondary-dark': '#e67a00',
                'secondary-light': '#ffc107',
                'danger': '#f44336',
                'danger-dark': '#d32f2f',
                'danger-light': '#ef5350',
                'success': '#4caf50',
                'success-dark': '#388e3c',
                'success-light': '#81c784',
                'info': '#2196f3',
                'info-dark': '#1976d2',
                'info-light': '#64b5f6',
                'warning': '#ffeb3b',
                'warning-dark': '#fdd835',
                'warning-light': '#ffecb3',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
