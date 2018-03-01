<template>
  <div style="width: 100%; height: 200px;">
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
          orient: 'vertical',
          right: 0,
          y: 'center',
          min: 1000,
          max: 80000,
          text: ['High', 'Low'],
          calculable : false,
          inRange: {
            color: ['#F0F4C3', '#DCE775', '#CDDC39'],
          },
          textStyle: {
            color: '#fff'
          }
        },
        series: [{
          type:'pie',
          data: [{value:0, name:''},
            {value:0, name:''}].sort(function (a, b) { return a.value - b.value; }),
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

      // set nilai awal

      Object.values(datas[0])[0].forEach((data, index) => {
        this.pie.series[0].data[index].name   = data.name + data.data.toLocaleString('EN')
        this.pie.series[0].data[index].value  = data.data
        this.pie.title.text = 'LPE Tahun ' + Object.keys(datas[0])[0]
      })

      var i = 1;

      setInterval(() => {
        Object.values(datas[0])[i].forEach((data, index) => {
          this.pie.series[0].data[index].name   = data.name + data.data.toLocaleString('EN')
          this.pie.series[0].data[index].value  = data.data
          this.pie.title.text = 'LPE Tahun ' + Object.keys(datas[0])[i]
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
