<template>
  <ul v-show="tablePagination && tablePagination.last_page > 1" :class="css.wrapperClass">
    <li :class="['', css.linkClass, isOnFirstPage ? css.disabledClass : '']"
        @click="loadPage(1)"
    >
      <i v-if="css.icons.first != ''" :class="[css.icons.first]" />
      <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <polyline points="11 7 6 12 11 17" />
          <polyline points="17 7 12 12 17 17" />
        </svg>
      </a>
    </li>
    <li :class="['', css.linkClass, isOnFirstPage ? css.disabledClass : '']"
        @click="loadPage('prev')"
    >
      <i v-if="css.icons.next != ''" :class="[css.icons.prev]" />
      <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="15 6 9 12 15 18" /></svg>
      </a>
    </li>
    <template v-if="notEnoughPages">
      <template v-for="n in totalPage">
        <li :class="[css.pageClass, isCurrentPage(n) ? css.activeClass : '']"
            @click="loadPage(n)"
        >
          <a class="page-link" href="javascript:void(0)" v-html="n" />
        </li>
      </template>
    </template>
    <template v-else>
      <template v-for="n in windowSize">
        <li :class="[css.pageClass, isCurrentPage(windowStart+n-1) ? css.activeClass : '']"
            @click="loadPage(windowStart+n-1)"
        >
          <a class="page-link" href="javascript:void(0)" v-html="windowStart+n-1" />
        </li>
      </template>
    </template>
    <li :class="['', css.linkClass, isOnLastPage ? css.disabledClass : '']"
        @click="loadPage('next')"
    >
      <i v-if="css.icons.next != ''" :class="[css.icons.next]" />
      <a class="page-link" href="javascript:void(0)">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="9 6 15 12 9 18" /></svg>
      </a>
    </li>
    <li :class="['', css.linkClass, isOnLastPage ? css.disabledClass : '']"
        @click="loadPage(totalPage)"
    >
      <i v-if="css.icons.last != ''" :class="[css.icons.last]" />
      <a class="page-link" href="javascript:void(0)">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <polyline points="7 7 12 12 7 17" />
          <polyline points="13 7 18 12 13 17" />
        </svg>
      </a>
    </li>
  </ul>
</template>

<script>
import PaginationMixin from './VuetablePaginationMixin.vue'

export default {
  mixins: [PaginationMixin]
}
</script>
