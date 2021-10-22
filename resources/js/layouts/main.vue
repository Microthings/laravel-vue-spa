<template>
  <div>
    <Sidebar />
    <child />
    <Footer />
  </div>
</template>

<script>
import Sidebar from '../components/template/Sidebar'
import Footer from '../components/template/Footer'

export default {
  name: 'Main',
  components: {
    Sidebar, Footer
  }
}
</script>

<style scoped>

</style>
