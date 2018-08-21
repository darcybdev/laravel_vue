<template>
  <div>
    <dashboard v-if="auth.user" />
    <landing-page v-if="!auth.user" />
  </div>
</template>
<script>
import { mapState } from 'vuex';

import Dashboard from './Dashboard';
import LandingPage from './LandingPage';

export default {
  components: {
    Dashboard,
    LandingPage
  },
  computed: {
    ...mapState({
      auth: state => state.auth
    })
  }
}
</script>
