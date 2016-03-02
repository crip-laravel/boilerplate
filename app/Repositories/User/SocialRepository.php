<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 2:37 PM
 */

namespace App\Repositories\User;

use App\Repositories\Contracts\ISocialRepository;
use App\Repositories\Repository;
use App\Social;

/**
 * Class SocialRepository
 * @package App\Repositories\User
 */
class SocialRepository extends Repository implements ISocialRepository
{
    /**
     * Retrieve model name
     *
     * @return string
     */
    public function model()
    {
        return Social::class;
    }

    /**
     * Allowed repo relations array
     *
     * @return array
     */
    public function relations()
    {
        return [
            'user'
        ];
    }

    /**
     * @param $social_id
     * @param $provider
     *
     * @return Social
     */
    public function findByProvider($social_id, $provider)
    {
        return $this->getModelBuilder()
            ->where('social_id', $social_id)
            ->where('provider', $provider)
            ->first();
    }
}