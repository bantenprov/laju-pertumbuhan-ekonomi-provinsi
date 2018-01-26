<?php namespace Bantenprov\LpeProvinsi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The LpeProvinsi facade.
 *
 * @package Bantenprov\LpeProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeProvinsi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lpe-provinsi';
    }
}
