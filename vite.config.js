import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/argon-dashboard.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
