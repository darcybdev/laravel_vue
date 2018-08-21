<template>
  <div class="auth-login">
    <h1>Login</h1>
    <b-form-group label="Username or Email" label-for="username">
      <b-form-input v-model="fd.username" type="text" id="username" />
    </b-form-group>
    <b-form-group label="Password" label-for="password">
      <b-form-input v-model="fd.password" type="password" />
    </b-form-group>
    <b-button @click="login" variant="primary">Login</b-button>
  </div>
</template>
<script>
export default {
  data: () => ({
    fd: {
      username: '',
      password: ''
    }
  }),
  methods: {
    login: () => {

    }
  }
}
</script>
<style lang="scss">
.auth-login {
  text-align: left;
}
</style>
