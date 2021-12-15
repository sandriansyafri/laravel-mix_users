import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Home from "../pages/Home.vue";
import About from "../pages/About.vue";
import User from "../pages/User.vue";
import Profile from "../pages/Profile.vue";
import Register from "../pages/Register.vue";
import Edit from "../pages/Edit.vue";
import Upload from "../pages/Upload.vue";
import NotFound from "../pages/NotFound.vue";

const routes = [
    { path: "/", component: Home },
    { path: "/about", component: About },
    { path: "/users", name: "users", component: User },
    { path: "/users/create", name: "users.create", component: Register },
    {
        path: "/users/:id/edit",
        name: "users.edit",
        component: Edit,
        props: true,
    },
    {
        path: "/users/:id/upload",
        name: "users.upload",
        component: Upload,
        props: true,
    },
    { path: "/users/:id", name: "users.show", component: Profile, props: true },
    { path: "*", component: NotFound },
];

const router = new VueRouter({
    linkActiveClass: "active",
    mode: "history",
    routes,
});

export default router;
