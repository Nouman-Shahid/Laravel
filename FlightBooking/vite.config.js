// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'vite-plugin-laravel';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel(),
    vue(), 
  ],
  css: {
    postcss: {
      plugins: [
        require('tailwindcss'),
        require('autoprefixer'),
      ],
    },
  },
});
