<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 4:20 PM
 */

namespace App\Services\Contracts;

/**
 * Interface IInputService
 * @package App\Services\Contracts
 */
interface IInputService
{
    /**
     * @param      $key
     * @param null $default
     * @param bool $deep
     *
     * @return mixed
     */
    public function get($key, $default = null, $deep = false);

    /**
     * @param string $key
     * @param null $default
     *
     * @return array
     */
    public function decode($key, $default = null);
}