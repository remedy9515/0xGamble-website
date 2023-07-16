import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/sections/pot-details.js',
                'resources/js/sections/tokenomics.js',
                'resources/js/sections/wallet.js',
                'resources/js/games/420.js',
            ],
            refresh: true,
        }),
    ],
});
