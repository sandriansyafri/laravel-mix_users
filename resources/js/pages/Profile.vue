<template>
    <div>
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <h1 class="mb-3">Profile</h1>
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
                <div class="card">
                    <div class="card-body">
                        <h5>Name : {{ user.name }}</h5>
                        <p>Email : {{ user.email }}</p>
                        <button
                            class="btn btn-danger rounded-0 px-5"
                            @click.prevent="deleteUser(user.id)"
                        >
                            DELETE
                        </button>
                        <button
                            class="btn btn-primary rounded-0 px-5"
                            @click.prevent="editUser(user.id)"
                        >
                            EDIT
                        </button>
                    </div>
                </div>
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
            user: {},
        };
    },
    created() {
        this.getUser();
    },
    methods: {
        getUser() {
            axios.get(`/api/users/${this.id}`).then((res) => {
                this.user = res.data;
            });
        },
        deleteUser(id) {
            axios.delete(`/api/users/${id}`).then((res) => {
                if (res.status) {
                    this.$noty.success(
                        `${res.data.data.name} ${res.data.message} `
                    );
                    this.$router.push({
                        name: "users",
                    });
                }
            });
        },
        editUser(id) {
            this.$router.push({
                name: "users.edit",
                params: { id },
            });
        },
    },
};
</script>

<style></style>
