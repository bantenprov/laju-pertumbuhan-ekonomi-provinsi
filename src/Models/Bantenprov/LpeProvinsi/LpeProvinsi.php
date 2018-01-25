<?php

namespace Bantenprov\LpePprovinsi\Models\Bantenprov\LpePprovinsi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LpePprovinsi extends Model
{

    protected $table = 'lpe_provinsis';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\LpePprovinsi\Models\Bantenprov\LpePprovinsi\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\LpePprovinsi\Models\Bantenprov\LpePprovinsi\Regency','id','regency_id');
    }

}

