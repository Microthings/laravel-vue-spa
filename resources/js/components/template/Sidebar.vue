<template>
  <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
        <span class="navbar-toggler-icon" />
      </button>
      <h1 class="navbar-brand navbar-brand-autodark text-center">
        <a onclick="void(0)">
          <img :src="imgBanner" alt="Logo KBPP" class="img-responsive p-0">
        </a>
      </h1>
      <div id="navbar-menu" class="collapse navbar-collapse">
        <div class="pt-lg-3">
          <ul v-for="(menu, menuIndex) in userMenu" :key="menuIndex" class="navbar-nav">
            <li v-if="menu.child.length === 0" class="nav-item">
              <router-link class="nav-link" active-class="active" :to="menu.path">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" v-html="menu.icon" />
                </span>
                <span class="nav-link-title">
                  {{ menu.title }}
                </span>
              </router-link>
            </li>
            <li v-else class="nav-item dropdown">
              <router-link class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false" to="#">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" v-html="menu.icon" />
                </span>
                <span class="nav-link-title">
                  {{ menu.title }}
                </span>
              </router-link>
              <div class="dropdown-menu">
                <div v-for="(item, itemIndex) in menu.child" :key="itemIndex">
                  <router-link :to="item.path" class="dropdown-item">
                    {{ item.title }}
                  </router-link>
                </div>
              </div>
            </li>
            <li v-if="userMenu.length-1 === menuIndex" class="nav-item">
              <a class="nav-link text-danger" href="#" @click.prevent="logout">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M7 12h14l-3 -3m0 6l3 -3" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Logout
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
</template>

<script>
import store from '~/store'
import { mapGetters } from 'vuex'
import { menuList } from '../../plugins/menus'
const bannerPath = '/images/app-logo.jpg'

export default {
  name: 'Sidebar',
  data () {
    return {
      imgBanner: bannerPath,
      userMenu: []
    }
  },
  computed: mapGetters({
    user: 'auth/user'
  }),
  created () {
    const menus = []
    const userRole = store.getters['auth/user'].role
    menuList.forEach(function (el) {
      if (typeof el.roles !== 'undefined') {
        if (el.roles.includes(userRole)) {
          menus.push(el)
        }
      } else {
        menus.push(el)
      }
    })
    this.userMenu = menus
  },
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>

</style>
