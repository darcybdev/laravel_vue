<template>
  <div class="auth-register">
    <h1>Register</h1>
    <b-form-group label="Email" label-for="email">
      <b-form-input id="email" v-model="fd.email" type="email" />
    </b-form-group>
    <b-form-group label="Username" label-for="username">
      <b-form-input id="username" v-model="fd.username" type="text" />
    </b-form-group>
    <b-form-group label="Password" label-for="password">
      <b-form-input id="password" v-model="fd.password" type="password" />
    </b-form-group>
    <b-button @click="register" variant="primary">Register</b-button>
  </div>
</template>
<script>

export default {
  data: () => ({
    fd: {
      email: '',
      username: '',
      password: ''
    }
  }),
  methods: {
    register () {

    }
  }
}
</script>
<style lang="scss">
.auth-register {
  text-align: left;
}
</style>
