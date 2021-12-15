<template>
    <div>
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <h1 class="mb-3">Register</h1>
            </div>
            <div class="col-6 text-end p-0">
                <router-link
                    :to="{ name: 'users' }"
                    class="btn btn-primary rounded-0 px-5"
                    >Kembali</router-link
                >
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form @submit.prevent="submitForm()">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input
                            v-model="users.name"
                            type="text"
                            class="form-control rounded-0"
                        />
                        <small class="text-danger" v-if="errors.name">
                            {{ errors.name[0] }}
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input
                            v-model="users.email"
                            type="text"
                            class="form-control rounded-0"
                        />
                        <small class="text-danger" v-if="errors.email">
                            {{ errors.email[0] }}
                        </small>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="btn btn-primary rounded-0 px-5"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["id"],
    data() {
        return {
            users: {
                name: "",
                email: "",
                password: "",
            },
            errors: {},
        };
    },
    created() {
        this.getUser();
    },
    methods: {
        getUser() {
            axios.get(`/api/users/${this.id}`).then((res) => {
                this.users = res.data;
            });
        },
        submitForm() {
            axios
                .put(`/api/users/${this.id}`, this.users)
                .then((res) => {
                    if (res.status) {
                        this.$noty.success(res.data.message);
                        this.$router.push({
                            name: "users",
                        });
                    }
                })
                .catch((e) => {
                    if (!e.response.data.status) {
                        this.errors = e.response.data.errors;
                    }
                });
        },
    },
};
</script>

<style></style>
