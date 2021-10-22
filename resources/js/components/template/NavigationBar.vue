<template>
  <div class="navbar-expand-md">
    <div id="navbar-menu" class="collapse navbar-collapse">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">
            <li v-for="menu in userMenu" class="nav-item">
              <router-link class="nav-link" active-class="active" :to="menu.path">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" v-html="menu.icon">
                  </svg>
                </span>
                <span class="nav-link-title">
                  {{ $t(menu.title) }}
                </span>
              </router-link>
            </li>
          </ul>
          <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="." method="get">
              <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                       stroke-linejoin="round"
                  ><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="10" cy="10" r="7" /><line
                    x1="21" y1="21" x2="15" y2="15"
                  /></svg>
                </span>
                <input type="text" class="form-control" placeholder="Search…" aria-label="Search in website">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from '~/store'
import { menuList } from '../../plugins/menus'

export default {
  name: 'NavigationBar',
  data () {
    return {
      userMenu: []
    }
  },
  created () {
    const menus = []
    const userRole = store.getters['auth/user'].role
    menuList.forEach(function (el) {
      if (typeof el.visible !== 'undefined') {
        if (el.visible.includes(userRole)) {
          menus.push(el)
        }
      } else {
        menus.push(el)
      }
    })
    this.userMenu = menus
  },
  render (createElement, context) {
    return createElement('svg', this.menus.icon)
  }
}
</script>
