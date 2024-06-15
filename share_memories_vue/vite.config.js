import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueJsx from '@vitejs/plugin-vue-jsx'
import VueDevTools from 'vite-plugin-vue-devtools'

// https://vitejs.dev/config/
export default defineConfig({
  server: {
    proxy: {
      '/api': {
        target: 'http://localhost:8000',
      },
      '/sanctum/csrf-cookie': {
        target: 'http://localhost:8000',
      },
      '/login': {
        target: 'http://localhost:8000',
      },
      '/logout': {
        target: 'http://localhost:8000',
      },
      '/register': {
        target: 'http://localhost:8000',
      },
    },
  },
  plugins: [
    vue(),
    vueJsx(),
    VueDevTools(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
})
