<template>
  <div class="auth-register">
    <h1>Register</h1>
    <form @submit.prevent="submitRegister">
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
    fd: {
      email: '',
      username: '',
      password: ''
    }
  }),
  methods: {
    ...mapActions('auth', ['register']),
    submitRegister() {
      this.register({
        email: this.fd.email,
        username: this.fd.username,
        password: this.fd.password
      }).then(response => {

      }, error => {
        console.log('register error', error);
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
