<template>
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            {{ title }}
          </div>
          <h2 class="page-title">
            {{ subTitle }}
          </h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PageTitle',
  props: {
    title: { type: String, required: true },
    subTitle: { type: String, required: true }
  }
}
</script>

<style scoped>

</style>
