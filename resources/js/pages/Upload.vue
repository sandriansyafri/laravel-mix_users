<template>
    <div>
        <div class="row">
            <div class="col">
                <h1>Upload Image</h1>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-4">
                <img
                    :src="previewImage"
                    alt=""
                    height="300"
                    class="img-fluid"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form @submit.prevent="submitForm()">
                    <div class="mb-3">
                        <label for="">Upload Image</label>
                        <input
                            type="file"
                            name=""
                            class="form-control"
                            id=""
                            @change="uploadImage($event)"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary rounded-0 px-5"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            previewImage: null,
            photo: null,
            user: {},
        };
    },
    props: ["id"],
    created() {
        axios.get(`/api/users/${this.id}`).then((res) => {
            this.user = res.data;
        });
    },
    methods: {
        uploadImage(e) {
            let files = e.target.files[0];
            this.previewImage = URL.createObjectURL(files);
            this.photo = files;
        },
        submitForm() {
            let formData = new FormData();
            formData.append("photo", this.photo);
            axios.post(`/api/users/photo/${this.id}`, formData).then((res) => {
                if (res.status) {
                    this.$noty.success(res.data.message);
                    this.$router.push({
                        name: "users.show",
                        params: { id: this.id },
                    });
                }
            });
        },
    },
};
</script>

<style></style>
