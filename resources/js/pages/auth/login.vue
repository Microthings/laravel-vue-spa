<template>
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="."><img :src="imgBanner" height="250" alt=""></a>
        <h1 class="text-center mb-4">
        <!-- {{ appName } }-->
        </h1>
      </div>
      <form class="card card-md" autocomplete="off" @submit.prevent="login" @keydown="form.onKeydown($event)">
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input v-model="form.username" :class="{ 'is-invalid': form.errors.has('username') }" name="username" type="text" class="form-control" placeholder="Username">
            <has-error :form="form" field="username" />
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
            </label>
            <div class="input-group input-group-flat">
              <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
              <has-error :form="form" field="password" />
            </div>
            <span class="form-label-description mt-1">
              <!--              <a href="#">Lupa password?</a>-->
            </span>
          </div>
          <div class="form-footer">
            <v-button :loading="form.busy" class="btn btn-primary w-100">
              Login
            </v-button>
          </div>
        </div>
      </form>
      <!--      <div class="text-center text-muted mt-3">-->
      <!--        Belum punya akun? <a href="./register" tabindex="-1">Registrasi</a>-->
      <!--      </div>-->
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import Cookies from 'js-cookie'
const bannerPath = '/images/app-logo.jpg'

export default {
  components: {
  },

  layout: 'empty',

  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      username: '',
      password: ''
    }),
    remember: false,
    imgBanner: bannerPath
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.redirect()
    },

    redirect () {
      const intendedUrl = Cookies.get('intended_url')

      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({ path: intendedUrl })
      } else {
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
