<template>
  <div></div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
  created () {
    this.confirmAccount();
  },
  methods: {
    ...mapActions('auth', ['confirm']),
    confirmAccount () {
      this.confirm({
        userId: this.$route.query.u,
        token: this.$route.query.t
      });
    }
  }
}
</script>
