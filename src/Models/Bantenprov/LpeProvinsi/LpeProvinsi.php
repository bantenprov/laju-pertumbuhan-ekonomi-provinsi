<?php

namespace Bantenprov\LpeProvinsi\Models\Bantenprov\LpeProvinsi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LpeProvinsi extends Model
{

    protected $table = 'lpe_provinsis';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\LpeProvinsi\Models\Bantenprov\LpeProvinsi\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\LpeProvinsi\Models\Bantenprov\LpeProvinsi\Regency','id','regency_id');
    }

}

