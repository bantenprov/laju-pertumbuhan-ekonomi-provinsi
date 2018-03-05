<template>
  <div style="width: 100%; height: 400px;">
    <IEcharts :option="pie" :resizable="true"></IEcharts>
  </div>
</template>

<script>
export default {
  data () {
    return {
      pie: {
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
        visualMap: {
          show: true,
          type: 'continuous',
          orient: 'horizontal',
          bottom: 30,
          x: 'center',
          min: 1000,
          max: 80000,
          text: ['High', 'Low'],
          calculable : false,
          inRange: {
            color: ['#B9F6CA', '#69F0AE', '#00C853'],
          },
          textStyle: {
            color: '#fff'
          }
        },
        series: [{
          type:'pie',
          data: [
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''}
                ].sort(function (a, b) { return a.value - b.value; }),
          radius: '55%',
          roseType: 'radius',
          cursor: 'default',
          itemStyle: {
            color: '#CDDC39'
          },
          label: {
            show: true,
            fontSize: 8,
            fontWeight: 'normal',
            fontStyle: 'normal',
            color: '#fff'
          },
          labelLine: {
            show: true,
            length: 10,
            lineStyle: {
              width: 1,
              type: 'solid',
              color: '#fff'
            }
          },
          animationType: 'scale',
          animationEasing: 'elasticOut',
          animationDelay: function (idx) {
            return Math.random() * 200;
          }
        }]
      }
    }
  },
  mounted: function () {
    axios.get('/json/bantenprov/lpe-provinsi/lpe-provinsi01.json').then(response => {

      let i = 0;

      for(var first = 0; first < Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length; first++){
        this.pie.series[0].data[first].value = Object.values(response.data[0].chartdata.grafik[0].tahun[0])[first]
        this.pie.series[0].data[first].name = Object.keys(response.data[0].chartdata.grafik[0].tahun[0])[first]
        this.pie.title.text = response.data[0].chartdata.grafik[0].index
      }

      this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) + 2000
      this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) - 2000

      setInterval(() => {
        i++;

        setTimeout(() => {
          for(var k = 0; k < Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length; k++){
            this.pie.series[0].data[k].value = Object.values(response.data[0].chartdata.grafik[i].tahun[0])[k]
            this.pie.series[0].data[k].name = Object.keys(response.data[0].chartdata.grafik[i].tahun[0])[k]

            this.pie.title.text = response.data[0].chartdata.grafik[i].index

            this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) + 6000
            this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) - 6000
          }
        }, 1000);

        if(i ==  response.data[0].chartdata.grafik.length) {
          i = 0;
        }
      }, 5000);
    })
    .catch(function(error) {
      // error
    });
  }
}
</script>