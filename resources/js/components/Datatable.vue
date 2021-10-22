<template>
  <div>
    <filter-bar />
    <vuetable ref="vuetable"
              :api-url="apiUrls"
              :fields="dataFields"
              pagination-path=""
              :css="css.table"
              :sort-order="sortFields"
              :multi-sort="true"
              :per-page="dataPerPages"
              detail-row-component="detail-row"
              :append-params="moreParams"
              :detail-row-fields="detailRowField"
              @vuetable:cell-clicked="onCellClicked"
              @vuetable:pagination-data="onPaginationData"
    />
    <div class="vuetable-pagination">
      <vuetable-pagination-info ref="paginationInfo"
                                info-class="pagination-info"
      />
      <vuetable-pagination ref="pagination"
                           :css="css.pagination"
                           @vuetable-pagination:change-page="onChangePage"
      />
    </div>
  </div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import accounting from 'accounting'
import moment from 'moment'
import Vue from 'vue'
import CustomActions from './vuetable/CustomActions'
import DetailRow from './vuetable/DetailRow'
import FilterBar from './vuetable/FilterBar'

Vue.component('CustomActions', CustomActions)
Vue.component('DetailRow', DetailRow)
Vue.component('FilterBar', FilterBar)

export default {
  name: 'Datatable',
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo
  },
  props: {
    apiUrls: { type: String, required: true },
    dataFields: { type: Array, required: true },
    sortFields: { type: Array, required: true },
    dataPerPages: { type: Number, default: 20 },
    detailRowFields: { type: Array, required: true }
  },
  data () {
    return {
      apiUrl: '',
      dataField: [],
      sortField: [],
      dataPerPage: [],
      css: {
        table: {
          tableClass: 'table table-bordered table-striped table-hover',
          ascendingIcon: 'glyphicon glyphicon-chevron-up',
          descendingIcon: 'glyphicon glyphicon-chevron-down'
        },
        pagination: {
          wrapperClass: 'pagination',
          activeClass: 'active',
          disabledClass: 'disabled',
          pageClass: 'page-item',
          linkClass: 'page-item',
          icons: {
            first: '',
            prev: '',
            next: '',
            last: ''
          }
        },
        icons: {
          first: 'glyphicon glyphicon-step-backward',
          prev: 'glyphicon glyphicon-chevron-left',
          next: 'glyphicon glyphicon-chevron-right',
          last: 'glyphicon glyphicon-step-forward'
        }
      },
      moreParams: {},
      detailRowField: []
    }
  },
  created () {
    this.apiUrl = this.apiUrls
    this.dataField = this.dataFields
    this.sortField = this.sortFields
    this.dataPerPage = this.dataPerPages
    this.detailRowField = this.detailRowFields
  },
  methods: {
    allcap (value) {
      return value.toUpperCase()
    },
    genderLabel (value) {
      return value === 'M'
        ? '<span class="label label-success"><i class="glyphicon glyphicon-star"></i> Male</span>'
        : '<span class="label label-danger"><i class="glyphicon glyphicon-heart"></i> Female</span>'
    },
    formatNumber (value) {
      return accounting.formatNumber(value, 2)
    },
    formatDate (value, fmt = 'D MMM YYYY') {
      return (value == null)
        ? ''
        : moment(value, 'YYYY-MM-DD').format(fmt)
    },
    onPaginationData (paginationData) {
      this.$refs.pagination.setPaginationData(paginationData)
      this.$refs.paginationInfo.setPaginationData(paginationData)
    },
    onChangePage (page) {
      this.$refs.vuetable.changePage(page)
    },
    onCellClicked (data, field, event) {
      // console.log('cellClicked: ', field.name)
      // this.$refs.vuetable.toggleDetailRow(data.id)
    }
  },
  events: {
    'toggle-detail-row' (data) {
      this.$refs.vuetable.toggleDetailRow(data.id)
    },
    'filter-set' (filterText) {
      this.moreParams = {
        filter: filterText
      }
      Vue.nextTick(() => this.$refs.vuetable.refresh())
    },
    'filter-reset' () {
      this.moreParams = {}
      Vue.nextTick(() => this.$refs.vuetable.refresh())
    },
    'view-siswa-detail' (data) {
      this.$router.push({ name: 'siswa-detail', params: { id: data.id } })
    }
  }
}
</script>

<style scoped>
.pagination {
  margin: 0;
  float: right;
}
</style>
