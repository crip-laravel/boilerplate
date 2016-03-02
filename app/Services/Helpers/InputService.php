<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 4:21 PM
 */

namespace App\Services\Helpers;

use App\Services\Contracts\IInputService;
use Input;

/**
 * Class InputService
 * @package App\Services\Helpers
 */
class InputService implements IInputService
{
    /**
     * @param      $key
     * @param null $default
     * @param bool $deep
     *
     * @return mixed
     */
    public function get($key, $default = null, $deep = false)
    {
        return Input::get($key, $default, $deep);
    }

    /**
     * @param string $key
     * @param null $default
     *
     * @return array
     */
    public function decode($key, $default = null)
    {
        $input = $this->get($key, $default);
        if ($input AND is_string($input)) {
            $input = json_decode($input, true);
        }

        return (array)$input;
    }
}