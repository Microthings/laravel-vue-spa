<template>
  <div class="page-wrapper">
    <page-title title="User" sub-title="User" />
    <div class="page-body">
      <div class="container-xl">
        <card title="User Data">
          <datatable
            :api-urls="dataTables.apiUrl"
            :data-fields="dataTables.dataField"
            :sort-fields="dataTables.sortField"
            :data-per-pages="dataTables.dataPerPages"
            :detail-row-fields="dataTables.detailRowField"
          />
        </card>
      </div>
    </div>
  </div>
</template>

<script>
import Datatable from '../../components/Datatable'

export default {
  name: 'User',
  components: {
    Datatable
  },
  middleware: 'superadmin',
  data () {
    return {
      dataTables: {
        apiUrl: 'api/userdata',
        dataField: [
          {
            name: '__sequence',
            title: '#',
            titleClass: 'text-right',
            dataClass: 'text-right'
          },
          {
            name: 'username',
            sortField: 'username'
          },
          {
            name: 'name',
            sortField: 'name'
          },
          {
            name: 'email',
            sortField: 'email'
          },
          {
            name: 'role',
            sortField: 'role'
          },
          {
            name: '__component:custom-actions',
            title: 'Actions',
            titleClass: 'text-center',
            dataClass: 'text-center'
          }
        ],
        sortField: [
          { field: 'username', sortField: 'username', direction: 'asc' }
        ],
        dataPerPages: 20,
        detailRowField: [
          {
            label: 'Username',
            key: 'username'
          },
          {
            label: 'Name',
            key: 'name'
          },
          {
            label: 'Email',
            key: 'email'
          },
          {
            label: 'role',
            key: 'role'
          }
        ]
      }
    }
  },
  metaInfo () {
    return { title: 'User Data' }
  }
}
</script>

<style scoped>

</style>
