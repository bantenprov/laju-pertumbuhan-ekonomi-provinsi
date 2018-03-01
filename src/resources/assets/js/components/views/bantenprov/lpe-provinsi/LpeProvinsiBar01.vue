<template>
  <div style="width: 100%; height: 400px;">
    <IEcharts :option="bar" :loading="loading" :resizable="true"></IEcharts>
  </div>
</template>

<script>
export default {
  data () {
    return {
      loading: false,
      bar: {
        title: {
          show: true,
          text: '',
          x: 'center',
          textStyle: {
            fontSize: 16,
            fontWeight: 'normal',
            fontStyle: 'normal',
            color: '#fff'
          }
        },
        tooltip: {
          show: true
        },
        toolbox: {
          show : true,
          orient : 'horizontal',
          bottom: 0,
          x: 'center',
          feature : {
            dataView: {
              show: true,
              lang: ['Data view', 'Cancel', ''],
              readOnly: true,
              backgroundColor: 'rgba(0,0,0,.65)',
              textareaColor: 'rgba(0,0,0,.5)',
              textareaBorderColor: 'rgba(0,0,0,.5)',
              textColor: '#fff',
              buttonColor: '#ddd',
              buttonTextColor: '#333'
            },
            saveAsImage: {
              show: true,
              backgroundColor: 'transparent',
              excludeComponents: ['toolbox', 'visualMap']
            }
          },
          iconStyle: {
            borderWidth: 1,
            borderType: 'solid',
            borderColor: '#fff'
          }
        },
        xAxis: {
          show: true,
          data: ['0','0','0','0','0','0'],
          axisLabel: {
            show: true,
            fontSize: 8,
            fontWeight: 'normal',
            fontStyle: 'normal',
            color: '#fff'
          },
          axisLine: {
            show: true,
            lineStyle: {
              width: 1,
              type: 'solid',
              color: '#fff'
            }
          },
          axisTick: {
            show: true
          },
          splitArea: {
            show: true
          },
          splitLine: {
            show: true,
            lineStyle: {
              width: 1,
              type: 'solid',
              color: '#eee'
            }
          }
        },
        yAxis: {
          show: true,
          axisLabel: {
            show: true,
            fontSize: 8,
            fontWeight: 'normal',
            fontStyle: 'normal',
            color: '#fff'
          },
          axisLine: {
            show: true,
            lineStyle: {
              width: 1,
              type: 'solid',
              color: '#fff'
            }
          },
          axisTick: {
            show: true
          },
          splitArea: {
            show: true
          },
          splitLine: {
            show: true,
            lineStyle: {
              width: 1,
              type: 'solid',
              color: '#eee'
            }
          }
        },
        series: [{
          type: 'bar',
          data: [],
          barWidth: 30,
          barGap: '30%',
          cursor: 'default',
          itemStyle: {
            color: '#FFEB3B'
          }
        }],
        label: {
          show: true,
          position: 'top',
          fontSize: 8,
          fontWeight: 'normal',
          fontStyle: 'normal',
          color: '#fff'
        }
      }
    }
  },
  mounted: function () {
    axios.get('/json/bantenprov/lpe-provinsi/lpe-provinsi01.json').then(response => {

      var e = response.data;
      var get = e[0].chartdata.grafik[0];

      let i = 0;

      this.bar.xAxis.data = Object.keys(response.data[0].chartdata.grafik[0].tahun[0]);
      this.bar.series[0].data = Object.values(response.data[0].chartdata.grafik[0].tahun[0]);
      this.bar.title.text = response.data[0].chartdata.grafik[0].title;

      setInterval(() => {
        i++;

        setTimeout(() => {
          this.bar.xAxis.data = Object.keys(response.data[0].chartdata.grafik[i].tahun[0]);
          this.bar.series[0].data = Object.values(response.data[0].chartdata.grafik[i].tahun[0]);
          this.bar.title.text = response.data[0].chartdata.grafik[i].title;
        }, 10);

        if(i ==  response.data[0].chartdata.grafik.length) {
          i = 0;
        }
      }, 5000);

      this.loading = false;
    })
    .catch(function(error) {
      // error
    });
  }
}
</script>
