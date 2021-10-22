<template>
  <header class="navbar navbar-expand-md navbar-dark bg-primary d-print-none">
    <div class="container-xl">
      <router-link :to="{ name: 'home' }" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <polyline points="5 12 3 12 12 3 21 12 19 12" />
          <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
          <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        </svg>
        &nbsp; Kembali ke Home
      </router-link>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        {{ currentTime }}
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item dropdown d-none d-md-flex me-3">
          <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
            <div class="card">
              <div class="card-body">
                Tidak ada notifikasi
              </div>
            </div>
          </div>
        </div>
        <div v-if="user" class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <img :src="user.photo_url != null ? user.photo_url : ''" alt="User Photo" class="avatar avatar-sm">
            <div class="d-none d-xl-block ps-2">
              <div>{{ user.name }}</div>
              <div class="mt-1 small text-muted">{{ user.email }}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <router-link :to="{ name: 'settings.profile' }" class="dropdown-item">
              {{ $t('settings') }}
            </router-link>
            <a href="#" class="dropdown-item" @click.prevent="logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from 'vuex'
import moment from 'moment'

export default {
  name: 'Header',

  data () {
    return {
      message: 'Current Time:',
      currentTime: null
    }
  },
  computed: mapGetters({
    user: 'auth/user'
  }),
  created () {
    this.currentTime = moment().locale('id').format(' HH:mm:ss - D MMMM YYYY')
    setInterval(() => this.updateCurrentTime(), 1000)
  },
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    updateCurrentTime () {
      this.currentTime = moment().locale('id').format('HH:mm:ss - D MMMM YYYY')
    }
  }
}
</script>
