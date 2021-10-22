<template>
  <div class="custom-actions">
    <a href="javascript:void(0)" class="btn btn-icon btn-info" aria-label="View" @click="itemAction('view-item', rowData, rowIndex)">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <circle cx="12" cy="12" r="2" />
        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
      </svg>
    </a>
    <a v-if="rowData.nisn != null" href="javascript:void(0)" class="btn btn-icon btn-success" aria-label="View" @click="detailAction(rowData)">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <rect x="3" y="4" width="18" height="16" rx="3" />
        <circle cx="9" cy="10" r="2" />
        <line x1="15" y1="8" x2="17" y2="8" />
        <line x1="15" y1="12" x2="17" y2="12" />
        <line x1="7" y1="16" x2="17" y2="16" />
      </svg>
    </a>
    <!--    <a href="javascript:void(0)" class="btn btn-icon btn-success" aria-label="View" @click="itemAction('edit-item', rowData, rowIndex)">-->
    <!--      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">-->
    <!--        <path stroke="none" d="M0 0h24v24H0z" fill="none" />-->
    <!--        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />-->
    <!--        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />-->
    <!--      </svg>-->
    <!--    </a>-->
    <!--    <a href="javascript:void(0)" class="btn btn-icon btn-danger" aria-label="View" @click="itemAction('delete-item', rowData, rowIndex)">-->
    <!--      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">-->
    <!--        <path stroke="none" d="M0 0h24v24H0z" fill="none" />-->
    <!--        <line x1="4" y1="7" x2="20" y2="7" />-->
    <!--        <line x1="10" y1="11" x2="10" y2="17" />-->
    <!--        <line x1="14" y1="11" x2="14" y2="17" />-->
    <!--        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />-->
    <!--        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />-->
    <!--      </svg>-->
    <!--    </a>-->
  </div>
</template>

<script>
export default {
  name: 'CustomActions',
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  methods: {
    itemAction (action, data, index) {
      // console.log('custom-actions: ' + action, data.nama, index)
      this.$events.fire('toggle-detail-row', data)
    },
    detailAction (data) {
      // console.log('custom-actions: ' + action, data.nama, index)
      this.$events.fire('view-siswa-detail', data)
    }
  }
}
</script>

<style>

</style>
