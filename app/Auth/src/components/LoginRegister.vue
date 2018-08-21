<template>
  <div class="auth-login-register">
    <login v-if="mode === 'login'" />
    <register v-if="mode === 'register'" />
    <forgot v-if="mode === 'forgot'" />
    <p class="extra-links" v-if="mode === 'login'">
      <b-button @click="mode = 'forgot'" variant="link">Reset Password</b-button>
      |
      <b-button @click="mode = 'register'" variant="link">Register</b-button>
    </p>
    <p class="extra-links" v-if="mode === 'forgot' || mode === 'register'">
      <b-button @click="mode = 'login'" variant="link">Login</b-button>
    </p>
  </div>
</template>
<script>

import Login from './Login';
import Register from './Register';
import Forgot from './Forgot';

export default {
  name: 'LoginRegister',
  components: {
    Forgot,
    Login,
    Register
  },
  data: () => ({
    mode: 'login'
  })
}
</script>
<style lang="scss">
.extra-links {
  text-align: left;
  margin: 12px 0;
  .btn-link {
    color: #fff;
    opacity: 0.7;
    text-decoration: none !important;
    border: none;
    &:hover {
      opacity: 1;
      color: inherit;
      text-decoration: none;
    }
  }
}
</style>
