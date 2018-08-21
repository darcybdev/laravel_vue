<template>
  <div class="auth-register">
    <h1>Register</h1>
    <b-alert :show="success" variant="success">Thanks for registering! Please check your email for a link to confirm your email.</b-alert>
    <b-alert :show="!!errors" variant="danger">
      <b>Error</b>
      <div v-for="(error, i) in errors" v-bind:key="i">{{ error.error[0] }}</div>
    </b-alert>
    <form @submit.prevent="submitRegister" v-if="!success">
      <b-form-group label="Email" label-for="email">
        <b-form-input id="email" v-model="fd.email" type="email" />
      </b-form-group>
      <b-form-group label="Username" label-for="username">
        <b-form-input id="username" v-model="fd.username" type="text" />
      </b-form-group>
      <b-form-group label="Password" label-for="password">
        <b-form-input id="password" v-model="fd.password" type="password" />
      </b-form-group>
      <b-button type="submit" variant="primary">Register</b-button>
    </form>
  </div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
  data: () => ({
    success: false,
    errors: null,
    fd: {
      email: '',
      username: '',
      password: ''
    }
  }),
  methods: {
    ...mapActions('auth', ['register']),
    submitRegister() {
      this.errors = null;
      this.register({
        email: this.fd.email,
        username: this.fd.username,
        password: this.fd.password
      }).then(response => {
        this.success = true;
      }).catch(errors => {
        this.errors = errors;
      });
    }
  }
}
</script>
<style lang="scss">
.auth-register {
  text-align: left;
}
</style>
