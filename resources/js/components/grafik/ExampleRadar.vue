<template>
  <div class="row">
    <div class="col">
      <div id="chartExampleRadar" ref="chartExampleRadar" class="chart-container" />
    </div>
  </div>
</template>

<script>
import * as am4core from '@amcharts/amcharts4/core'
import * as am4charts from '@amcharts/amcharts4/charts'
import am4themes_animated from '@amcharts/amcharts4/themes/animated'
am4core.useTheme(am4themes_animated)

export default {
  name: 'ExampleRadar',
  data () {
    return {
      jumlahPerkara: '',
      chart: null
    }
  },
  mounted () {
    const vm = this
    vm.chart = am4core.create('chartExampleRadar', am4charts.RadarChart)
    vm.chart.data = [
      {
        penilaian: 'Spiritual',
        nilai: 90
      },
      {
        penilaian: 'Sosial',
        nilai: 75
      },
      {
        penilaian: 'Pengetahuan',
        nilai: 85
      },
      {
        penilaian: 'Keterampilan',
        nilai: 84
      }
    ]

    /* Create axes */
    const categoryAxis = vm.chart.xAxes.push(new am4charts.CategoryAxis())
    categoryAxis.dataFields.category = 'penilaian'

    const valueAxis = vm.chart.yAxes.push(new am4charts.ValueAxis())
    valueAxis.renderer.axisFills.template.fill = vm.chart.colors.getIndex(2)
    valueAxis.renderer.axisFills.template.fillOpacity = 0.05

    /* Create and configure series */
    const series = vm.chart.series.push(new am4charts.RadarSeries())
    series.dataFields.valueY = 'nilai'
    series.dataFields.categoryX = 'penilaian'
    series.name = 'Grafik Penilaian'
    series.strokeWidth = 3
  },
  beforeDestroy () {
    if (this.chart) {
      this.chart.dispose()
    }
  },
  methods: {
  }
}
</script>

<style scoped>
.chart-container {
  width: 100%;
  height: 250px;
}
</style>
