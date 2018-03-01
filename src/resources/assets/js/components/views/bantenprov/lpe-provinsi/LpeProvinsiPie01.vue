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