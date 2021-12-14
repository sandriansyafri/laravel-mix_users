<template>
  <nav
    class="
      navbar navbar-expand-lg navbar-light
      bg-white
      py-2
      border-0 border-bottom
      mb-3
    "
  >
    <div class="container">
      <router-link class="navbar-brand" to="/">Hello Project</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/About">About</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/users">User</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {};
</script>

<style></style>
