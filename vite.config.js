import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/ts/product/add-product.ts",
                "resources/ts/product/edit-product.ts",
                "resources/ts/product/delete-product.ts",
            ],
            refresh: true,
        }),
    ],
});
