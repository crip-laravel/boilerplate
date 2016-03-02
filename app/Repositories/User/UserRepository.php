<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 2:35 PM
 */

namespace App\Repositories\User;

use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Repository;
use App\User;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository implements IUserRepository
{
    /**
     * Retrieve model name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Allowed repo relations array
     *
     * @return array
     */
    public function relations()
    {
        return [
            // TODO: add user relations
        ];
    }

    /**
     * Find single user by email
     *
     * @param $email
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->getModelBuilder()
            ->where('email', $email)
            ->first();
    }
}