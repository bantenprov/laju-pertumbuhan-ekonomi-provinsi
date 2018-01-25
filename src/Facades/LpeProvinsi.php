<?php namespace Bantenprov\LpePprovinsi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The LpePprovinsi facade.
 *
 * @package Bantenprov\LpePprovinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpePprovinsi extends Facade
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
