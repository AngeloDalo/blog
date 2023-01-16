
window.Vue = require('vue');

import App from './views/App';
import Post from './pages/Post';
import Posts from './pages/Posts';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:  [
            {
                path: '/',
                name: 'posts',
                component: Posts
            },
            {
                path: '/posts/:id',
                name: 'post',
                props: true,
                component: Post
            },
        ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
