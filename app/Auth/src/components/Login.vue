<template>
  <div class="auth-login">
    <h1>Login</h1>
    <form @submit.prevent="submitLogin">
      <b-alert :show="error" variant="danger">Invalid Username, Email or Password</b-alert>
      <b-form-group label="Username or Email" label-for="username">
        <b-form-input v-model="fd.username" type="text" id="username" />
      </b-form-group>
      <b-form-group label="Password" label-for="password">
        <b-form-input v-model="fd.password" type="password" />
      </b-form-group>
      <b-button type="submit" variant="primary">Login</b-button>
    </form>
  </div>
</template>
<script>

import { mapActions } from 'vuex';

export default {
  data () {
    return {
      error: false,
      fd: {
        username: '',
        password: ''
      }
    };
  },
  methods: {
    ...mapActions('auth', ['login']),
    submitLogin () {
      this.login({
        username: this.fd.username,
        password: this.fd.password
      }).then(user => {
        // Success login, home route will switch to logged-in
        // app based on updated auth state
        // Store will also handle showing logged in message
      }).catch(error => {
        this.error = true;
      });
    }
  }
}
</script>
<style lang="scss">
.auth-login {
  text-align: left;
}
</style>
