import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home.vue"
import About from "./pages/About.vue"
import SinglePost from "./components/SinglePost.vue"
import Categories from "./components/Categories.vue"
import SingleCategory from "./components/SingleCategory.vue"

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            path: "/categories",
            name: "categories",
            component: Categories
        },
        {
            path: "/categories/:slug",
            name: "single-category",
            component: SingleCategory
        },
        {
            path: "/*",
            name: "404-notFound",
            component: SinglePost
            // PageNotFound
        },
    ]
});

export default router