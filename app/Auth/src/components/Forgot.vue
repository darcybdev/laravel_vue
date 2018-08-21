<template>
  <div class="auth-forgot">
    <h2>Reset Password</h2>
    <b-form-group label="Email" label-for="email">
      <b-form-input id="email" v-model="fd.email" type="email" />
    </b-form-group>
    <b-button @click="sendForgot" variant="primary">Send Reset Password Email</b-button>
  </div>
</template>
<script>

export default {
  data: () => ({
    fd: {
      email: ''
    }
  }),
  methods: {
    sendForgot () {

    }
  }
}
</script>
<style lang="scss">
.auth-forgot {
  text-align: left;
}
</style>
