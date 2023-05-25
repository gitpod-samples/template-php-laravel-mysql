import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import fs from 'fs'

export default defineConfig({
    server: {
        https: {
            key: fs.readFileSync('/home/sail/mkcert/dev.pem'),
            cert: fs.readFileSync('/home/sail/mkcert/cert.pem'),
        },
        origin: '5173-gitpodsampl-templatephp-s8213wyqqzn.ws-us98.gitpod.io',
        cors: {
            origin: ["5173-gitpodsampl-templatephp-s8213wyqqzn.ws-us98.gitpod.io"],
            credentials: 'include'
        },
        host: true,
        hmr: {
            https: true,
            host: '5173-gitpodsampl-templatephp-s8213wyqqzn.ws-us98.gitpod.io',
            port: 5173,
            clientPort: 443
        }
    },
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
});
