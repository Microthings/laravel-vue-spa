<template>
  <div class="row">
    <label class="form-label">Pencarian Data</label>
    <div class="col-md-6">
      <div class="input-icon mb-3">
        <input v-model="filterText" type="text" class="form-control" placeholder="Ketik kata kunci pencarian" @keyup.enter="doFilter">
        <span class="input-icon-addon">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
        </span>
      </div>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary" @click.prevent="doFilter">
        Cari
      </a>
      <a href="#" class="btn" @click.prevent="resetFilter">
        Reset
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FilterBar',
  data () {
    return {
      filterText: ''
    }
  },
  methods: {
    doFilter () {
      this.$events.fire('filter-set', this.filterText)
    },
    resetFilter () {
      this.filterText = ''
      this.$events.fire('filter-reset')
    }
  }
}
</script>
<style>

</style>
