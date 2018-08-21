<template>
  <div class="auth-forgot">
    <h2>Reset Password</h2>
    <b-alert :show="success" variant="success">Thanks! Please check your email for a link to reset your password.</b-alert>
    <b-alert :show="!!error" variant="danger">{{ error }}</b-alert>
    <form novalidate @submit.prevent="submitForm" v-if="!success">
      <b-form-group label="Email" label-for="email">
        <b-form-input id="email" v-model="fd.email" type="email" />
      </b-form-group>
      <b-button type="submit" variant="primary">Send Reset Password Email</b-button>
    </form>
  </div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
  data: () => ({
    success: false,
    error: null,
    fd: {
      email: ''
    }
  }),
  methods: {
    ...mapActions('auth', ['forgotPassword']),
    submitForm () {
      this.error = null;
      this.forgotPassword({
        email: this.fd.email
      }).then(() => {
        this.success = true;
      }).catch(error => {
        console.log('forgot error', error.response.data);
        this.error = error.response.data.errors[0].error;
      });
    }
  }
}
</script>
<style lang="scss">
.auth-forgot {
  text-align: left;
}
</style>
