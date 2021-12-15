<template>
  <div class="row">
    <div class="col">
      <h1>Daftar Users</h1>

      <router-link
        :to="{ name: 'users.create' }"
        class="btn btn-primary rounded-0 px-5"
        >Register
      </router-link>

      <ul class="list-group" v-for="user in users" :key="user.id">
        <li class="list-group-item rounded-0">
          <!-- <router-link
              class="nav-link"
              :to="{ name: 'users.show', params: { name: user.name } }"
            >
              <span class="text-capitalize">{{ user.name }}</span>
            </router-link> -->
          <a @click.prevent="userDetail(user.id)" class="btn">
            <span class="text-capitalize">{{ user.name }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["id"],
  data() {
    return {
      users: [],
    };
  },
  created() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios.get("/api/users").then((res) => {
        this.users = res.data;
      });
    },
    userDetail(id) {
      this.$router.push({
        name: "users.show",
        params: {
          id,
        },
      });
    },
  },
};
</script>

<style></style>
