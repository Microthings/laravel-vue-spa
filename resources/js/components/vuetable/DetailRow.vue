<template>
  <div class="row" @click="onClick">
    <div class="col">
      <div class="card">
        <div class="card-status-start bg-primary" />
        <div class="card-body">
          <h3 class="card-title">
            Detail Data
          </h3>
          <table>
            <tbody>
              <tr v-for="data in rowField" :key="data.key">
                <td>
                  <b>{{ data.label }}</b>
                </td>
                <td>
                  &emsp;{{ rowData[data.key] }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DetailRow',
  props: {
    rowDetails: {
      type: Array,
      required: true
    },
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  data () {
    return {
      rowField: []
    }
  },
  created () {
    this.rowField = this.rowDetails
  },
  methods: {
    onClick (event) {
      // console.log('row-detail: on-click', event.target)
    }
  }
}
</script>
