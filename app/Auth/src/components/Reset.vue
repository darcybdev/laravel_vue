<template>
  <div class="auth-reset">
    <h1>Reset Password</h1>
    <b-alert :show="!!error" variant="danger"><b>Error:</b> {{ error }}</b-alert>
    <form @submit.prevent="submitForm">
      <b-form-group label="Email" label-for="email">
        <b-form-input type="email" v-model="fd.email" id="email" />
      </b-form-group>
      <b-form-group label="New Password" label-for="password">
        <b-form-input type="password" v-model="fd.password" id="password" />
      </b-form-group>
      <b-form-group label="Confirm Password" label-for="password_confirmation">
        <b-form-input type="password" v-model="fd.password_confirmation" id="password_confirmation" />
      </b-form-group>
      <b-button type="submit" variant="primary">Reset Password</b-button>
    </form>
  </div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
  data: () => ({
    error: null,
    fd: {
      email: '',
      password: '',
      password_confirmation: ''
    }
  }),
  methods: {
    ...mapActions('auth', ['resetPassword']),
    submitForm () {
      this.error = null;
      this.resetPassword({
        email: this.fd.email,
        password: this.fd.password,
        password_confirmation: this.fd.password_confirmation,
        token: this.$route.query.token
      }).catch(error => {
        this.error = error;
      });
    }
  }
}
</script>
<style lang="scss">
.auth-reset {
  text-align: left;
}
</style>
