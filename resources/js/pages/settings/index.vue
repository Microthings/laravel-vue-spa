<template>
  <left-menu />
</template>

<script>
import LeftMenu from '../../components/template/LeftMenu'

export default {
  components: { LeftMenu },
  middleware: 'auth',
  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
