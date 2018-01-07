<template>
    <div>
      <filter-bar></filter-bar>
        <div class="vuetable-pagination ui basic segment centered grid">
        <vuetable-pagination ref="pagination"
                             @vuetable-pagination:change-page="onChangePage"
        ></vuetable-pagination>
        </div>
        <vuetable ref="vuetable"
                  api-url="https://vuetable.ratiw.net/api/users"
                  :fields="fields"
                  :per-page="10"
                  track-by="item_code"
                  pagination-path=""
                  @vuetable:pagination-data="onPaginationData"
        ></vuetable>
    </div>
</template>
<style scoped>

</style>
<script>
import Vue from 'vue'
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
import adminTableCustomActions from './adminTablesCustomActions'
import adminTableFilter from './adminTablesFilterBar'
import fieldDatas from './dataPartialsTable'

Vue.component('custom-actions', adminTableCustomActions) // panggil global use

export default {
  data(){
      return {
        fields: fieldDatas
      }
  },
  components: {
    Vuetable,
    VuetablePagination,
    'filter-bar': adminTableFilter
  },
  methods: {
      genderLabel(value) {
          return value === 'M'
          ? '<span class="ui teal label"><i class="large man icon"></i>Male</span>'
          : '<span class="ui pink label"><i class="large man icon"></i>Female</span>'
      },
        onPaginationData (paginationData) {
      this.$refs.pagination.setPaginationData(paginationData)
    },
    onChangePage (page) {
      this.$refs.vuetable.changePage(page)
    },
  }
}
</script>
