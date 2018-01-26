# Laju Pertumbuhan Ekonomi Provinsi

[![Join the chat at https://gitter.im/lpe-provinsi/Lobby](https://badges.gitter.im/lpe-provinsi/Lobby.svg)](https://gitter.im/lpe-provinsi/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/lpe-provinsi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/lpe-provinsi/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/lpe-provinsi/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/lpe-provinsi/build-status/master)


Laju Pertumbuhan Ekonomi (LPE) Provinsi Banten dan Indonesia


#### Cara install :

```bash
$ composer require bantenprov/lpe-provinsi:dev-master
```

#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\LpeProvinsi\LpeProvinsiServiceProvider::class,

```

#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/lpe-provinsi',
    components: {
      main: resolve => require(['./components/views/bantenprov/lpe-provinsi/DashboardLpeProvinsi.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "lPE Provinsi"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/lpe-provinsi',
      components: {
        main: resolve => require(['./components/bantenprov/lpe-provinsi/LpeProvinsiAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "lPE Provinsi"
      }
    }
 //== ...   
  ]
},

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'lPE Provinsi',
          link: '/dashboard/lpe-provinsi',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
```


#### Tambahkan components `resources/assets/js/components.js` :

```javascript
import LpeProvinsi from './components/bantenprov/lpe-provinsi/LpeProvinsi.chart.vue';
Vue.component('echarts-lpe-provinsi', LpeProvinsi);

import LpeProvinsiKota from './components/bantenprov/lpe-provinsi/LpeProvinsiKota.chart.vue';
Vue.component('echarts-lpe-provinsi-kota', LpeProvinsiKota);

import LpeProvinsiTahun from './components/bantenprov/lpe-provinsi/LpeProvinsiTahun.chart.vue';
Vue.component('echarts-lpe-provinsi-tahun', LpeProvinsiTahun);

import LpeProvinsiAdminShow from './components/bantenprov/lpe-provinsi/LpeProvinsiAdmin.show.vue';
Vue.component('admin-view-lpe-provinsi-tahun', LpeProvinsiAdminShow);

//== Echarts pdrb

import LpeProvinsiBar01 from './components/views/bantenprov/lpe-provinsi/LpeProvinsiBar01.vue';
Vue.component('lpe-provinsi-bar-01', LpeProvinsiBar01);

import LpeProvinsiBar02 from './components/views/bantenprov/lpe-provinsi/LpeProvinsiBar02.vue';
Vue.component('lpe-provinsi-bar-02', LpeProvinsiBar02);

//== mini bar charts
import LpeProvinsiBar03 from './components/views/bantenprov/lpe-provinsi/LpeProvinsiBar03.vue';
Vue.component('lpe-provinsi-bar-03', LpeProvinsiBar03);

import LpeProvinsiPie01 from './components/views/bantenprov/lpe-provinsi/LpeProvinsiPie01.vue';
Vue.component('lpe-provinsi-pie-01', LpeProvinsiPie01);

import LpeProvinsiPie02 from './components/views/bantenprov/lpe-provinsi/LpeProvinsiPie02.vue';
Vue.component('lpe-provinsi-pie-02', LpeProvinsiPie02);

//== mini pie charts
import LpeProvinsiPie03 from './components/views/bantenprov/lpe-provinsi/LpeProvinsiPie03.vue';
Vue.component('lpe-provinsi-pie-03', LpeProvinsiPie03);

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=pdrb-assets
$ php artisan vendor:publish --tag=pdrb-public
```
