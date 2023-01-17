<template>
    <div class="contain">
        <div
            class="shadow row mb-5 border border-danger rounded-3 p-3 bg-light"
            v-for="post in posts"
            :key="post.id"
        >
            <div class="col-lg-6 col-12 div-img">
                <img
                    class="w-100 h-100 rounded-3"
                    :src="'storage/' + post.image"
                    :alt="post.title"
                />
                <p class="price text-light px-3">
                    {{ post.title }} &euro;
                </p>
            </div>
            <div class="col-lg-6 col-12">
                <title class="font-weight-bold text-danger">
                    {{ post.title }}
                </title>
                <h3 class="font-weight-bold text-danger">
                    {{ post.eyelet }}
                </h3>
                <p>
                    <span class="fw-bold text-uppercase">Address:</span>
                    {{ post.content }}
                </p>
                <router-link
                    class="btn btn-danger mb-2 text-light"
                    :to="{
                        name: 'post',
                        params: { id: post.id },
                    }"
                >
                    View
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
export default {
    name: "Posts",
    data() {
        return {
            query: null,
            posts: [],
        };
    },
    created() {
        this.getPosts('http://127.0.0.1:8000/api/v1/posts');
    },
    mounted() {
    },
    methods: {
        getPosts(url) {
                Axios.get(url).then(
                    (result) => {
                        console.log(result);
                        this.posts = result.data.results;
                        console.log(this.posts);
                    });
            },
    },
};
</script>

<style lang="scss" scoped>

</style>
