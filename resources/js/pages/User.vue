<template>
  <div class="row">
    <div class="col">
      <template v-if="name">
        <div class="row mb-4">
          <div class="col">
            <router-link
              to="/users"
              class="btn btn-outline-primary rounded-0 px-5"
              >Kembali</router-link
            >
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h5 class="mb-3">Hello {{ name }}</h5>
          </div>
        </div>
      </template>

      <template v-else>
        <h1>Daftar Users</h1>
        <ul class="list-group" v-for="user in users" :key="user.id">
          <li class="list-group-item rounded-0">
            <!-- <router-link
              class="nav-link"
              :to="{ name: 'users.show', params: { name: user.name } }"
            >
              <span class="text-capitalize">{{ user.name }}</span>
            </router-link> -->
            <a @click.prevent="userDetail(user.name)" class="btn">
              <span class="text-capitalize">{{ user.name }}</span>
            </a>
          </li>
        </ul>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: ["name"],
  data() {
    return {
      users: [
        { id: 1, name: "sandrian" },
        { id: 2, name: "hafid" },
        { id: 3, name: "yogi" },
      ],
    };
  },
  methods: {
    userDetail(name) {
      this.$router.push({
        name: "users.show",
        params: {
          name: name,
        },
      });
    },
  },
};
</script>

<style>
</style>