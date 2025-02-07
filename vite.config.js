import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import crypto from 'crypto-browserify';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            // Polyfill crypto module
            crypto: 'crypto-browserify',
        },
    },
});
