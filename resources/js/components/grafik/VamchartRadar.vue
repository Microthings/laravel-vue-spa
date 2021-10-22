<template>
  <v-chart class="chart" :option="option" />
</template>

<script>
import { use } from 'echarts/core'
import { CanvasRenderer } from 'echarts/renderers'
import { RadarChart } from 'echarts/charts'
import {
  TitleComponent,
  TooltipComponent,
  LegendComponent
} from 'echarts/components'
import VChart, { THEME_KEY } from 'vue-echarts'

use([
  CanvasRenderer,
  RadarChart,
  TitleComponent,
  TooltipComponent,
  LegendComponent
])

export default {
  name: 'VamchartRadar',
  components: {
    VChart
  },
  provide: {
    [THEME_KEY]: 'light'
  },
  data () {
    return {
      option: {
        tooltip: {},
        radar: {
          // shape: 'circle',
          indicator: [
            { name: 'Spiritual', max: 100 },
            { name: 'Sosial', max: 100 },
            { name: 'Pengetahuan', max: 100 },
            { name: 'Keterampilan', max: 100 },
            { name: 'Kepribadian', max: 100 },
            { name: 'Jasmani', max: 100 }
          ]
        },
        series: [
          {
            name: 'Aspek Penilaian Siswa',
            type: 'radar',
            data: [
              {
                value: [80, 90, 96, 81, 78, 82],
                name: 'Aspek Penilaian'
              }
            ],
            tooltip: {
              // do something here if you want
            }
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
.chart {
  width: 100%;
  min-height: 300px
}
</style>
