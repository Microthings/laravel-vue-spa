<template>
  <div class="container-xl">
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            {{ pretitle }}
          </div>
          <h2 class="page-title">
            {{ title }}
          </h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Breadcrumb',
  props: {
    pretitle: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    }
  }
}
</script>
