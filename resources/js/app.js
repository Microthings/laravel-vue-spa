import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import tabler from '@tabler/core'
import App from '~/components/App'

import '~/plugins'
import '~/components'

Vue.component(tabler)
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
