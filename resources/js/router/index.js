import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

const Home = require("../pages/Home.vue").default;
const About = require("../pages/About.vue").default;
const NotFound = require("../pages/NotFound.vue").default;
const User = require("../pages/User.vue").default;

const routes = [
    { path: "/", component: Home },
    { path: "/about", component: About },
    { path: "/users/:name?", name: "users.show", component: User, props: true },
    { path: "*", component: NotFound },
];

const router = new VueRouter({
    linkActiveClass: "active",
    mode: "history",
    routes,
});

export default router;
