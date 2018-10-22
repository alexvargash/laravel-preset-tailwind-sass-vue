/**
 * We'll load the axios HTTP library and register the CSRF Token as a common header.
 */

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Attached the Vue library to the window object and import the vue dependencies.
 */

import VueRouter from 'vue-router';

window.Vue = require('vue');
