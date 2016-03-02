<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 3:06 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;

/**
 * Class AppModel
 * @package App
 */
class AppModel extends Model
{
    /**
     * @param $query
     * @return \Eloquent
     */
    public function scopeOrder($query)
    {
        $order = Input::get('order', isset($this->order) ? $this->order : 'id') ?: 'id';
        $direction = Input::get('direction', isset($this->direction) ? $this->direction : 'desc') ?: 'desc';

        return $query->orderBy($order, $direction);
    }
}