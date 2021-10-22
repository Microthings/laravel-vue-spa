<template>
  <div class="page-wrapper">
    <page-title title="Settings" sub-title="Settings" />
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
          <div class="col-md-3">
            <card :title="'Akun'" class="settings-card">
              <ul class="nav flex-column nav-pills">
                <li v-for="menu in settings" :key="menu.route" class="nav-item">
                  <router-link :to="{ name: menu.route }" class="nav-link" active-class="active">
                    {{ menu.name }}
                  </router-link>
                </li>
              </ul>
            </card>
          </div>

          <div class="col-md-9">
            <transition name="fade" mode="out-in">
              <router-view />
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LeftMenu',

  computed: {
    settings () {
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

<style scoped>

</style>
