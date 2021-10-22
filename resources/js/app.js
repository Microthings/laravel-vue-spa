import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import tabler from '@tabler/core'
import Toast from 'vue-toastification'
import VueEvents from 'vue-events'
import App from '~/components/App'

import '~/plugins'
import '~/components'

Vue.prototype.appName = window.config.appName

Vue.component(tabler)
Vue.use(VueEvents)
Vue.use(Toast)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
