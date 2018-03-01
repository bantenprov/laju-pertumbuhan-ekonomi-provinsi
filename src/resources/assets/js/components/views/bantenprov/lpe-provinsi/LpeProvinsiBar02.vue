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
          data: [],
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
            show: false
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
            show: false,
            lineStyle: {
              width: 1,
              type: 'solid',
              color: '#eee'
            }
          }
        },
        series: [{
          type: 'bar',
          data: [
            {value:0, name:''},
            {value:0, name:''},
            {value:0, name:''},
            {value:0, name:''},
            {value:0, name:''},
            {value:0, name:''},
            {value:0, name:''},
            {value:0, name:''}
          ],
          barWidth: 30,
          barGap: '30%',
          cursor: 'default',
          itemStyle: {
            color: '#3F51B5'
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
    axios.get('/json/bantenprov/lpe-provinsi/lpe-provinsi02.json').then(response => {

      let obj_key = [];
      var datas = response.data;

      function removeDuplicates(arr){
        var unique_array = []
        for(var i = 0;i < arr.length; i++){
          if(unique_array.indexOf(arr[i]) == -1){
              unique_array.push(arr[i])
          }
        }
        return unique_array
      }

      Object.values(datas[0])[0].forEach((data, index) => {
        this.bar.xAxis.data[index] = data.name
        this.bar.series[0].data[index].name   = data.name
        this.bar.series[0].data[index].value  = data.data
        this.bar.title.text = 'Laju Pertumbuhan Ekonomi Tahun  ' + Object.keys(datas[0])[0]
      })

      var i = 1;

      // perulangan
      setInterval(() => {
        Object.values(datas[0])[i].forEach((data, index) => {
          this.bar.series[0].data[index].name   = data.name
          this.bar.series[0].data[index].value  = data.data
          this.bar.title.text = 'Laju Pertumbuhan Ekonomi Tahun ' + Object.keys(datas[0])[i]
        });

        i++;

        if(i == Object.keys(datas[0]).length) {
          i = 0;
        }
      }, 4000)
    })
    .catch(function(error) {
      // error
    });
  }
}
</script>
