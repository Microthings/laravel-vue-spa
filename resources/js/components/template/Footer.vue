<template>
  <footer class="footer footer-transparent d-print-none">
    <div class="container">
      <div class="row text-center align-items-center flex-row-reverse">
        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
          <ul class="list-inline list-inline-dots mb-0">
            <li class="list-inline-item">
              {{ this.appName }}. Copyright © 2021
              All rights reserved.
            </li>
            <li class="list-inline-item">
              <a href="javascript:void(0)" class="link-secondary" rel="noopener">v1.0</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer'
}
</script>
