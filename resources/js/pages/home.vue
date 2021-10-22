<template>
  <div class="page-wrapper">
    <page-title title="" :sub-title="'Dashboard '+appName" />
    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-status-start bg-primary"></div>
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">
                    Jumlah Data
                  </div>
                </div>
                <div class="h1 mb-3">
                  <span v-if="dataSiswa == null" class="animated-dots text-primary w-100" />
                  <span v-else>
                    {{ dataSiswa.total }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'

import ExampleRadar from "../components/grafik/ExampleRadar";
import VamchartRadar from "../components/grafik/VamchartRadar";
import VamchartTest from "../components/grafik/VamchartTest";
export default {
  components: {VamchartTest, VamchartRadar, ExampleRadar},
  middleware: 'auth',
  data () {
    return {
      dataSiswa: null
    }
  },
  mounted () {
    // Jalankan method saat page selesai diload

    // const vm = this
    // vm.getData().then(function (data) {
    //   vm.dataSiswa = data
    // })
  },
  methods: {
    // async getData () {
    //   try {
    //     const url = '/api/siswa/get'
    //     const response = await axios.get(url)
    //     return response.data
    //   } catch (err) {
    //     if (err.response) {
    //       // client received an error response (5xx, 4xx)
    //       console.log('Server Error:', err)
    //     } else if (err.request) {
    //       // client never received a response, or request never left
    //       console.log('Network Error:', err)
    //     } else {
    //       console.log('Client Error:', err)
    //     }
    //   }
    // }
  },

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
