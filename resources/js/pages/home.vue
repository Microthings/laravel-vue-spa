<template>
  <div class="page-wrapper">
    <div class="page-body">
      <div class="container-xl">
        <card :title="$t('home')">
          {{ $t('you_are_logged_in') }}
        </card>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
export default {
  middleware: 'auth',

  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
