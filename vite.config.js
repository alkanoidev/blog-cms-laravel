import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/assets/css/argon-dashboard.css', 'resources/js/app.js', 'resources/css/app.css', 'resources/scss/argon-dashboard.scss'],
            refresh: true,
        }),
    ],
});
