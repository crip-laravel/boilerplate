<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 2:49 PM
 */

namespace App\Repositories\Contracts;

use App\Social;

/**
 * Interface ISocialRepository
 * @package App\Repositories\Contracts
 */
interface ISocialRepository extends IRepository
{
    /**
     * @param $social_id
     * @param $provider
     *
     * @return Social
     */
    public function findByProvider($social_id, $provider);
}