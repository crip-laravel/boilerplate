<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 2:49 PM
 */

namespace App\Repositories\Contracts;

use App\User;

/**
 * Interface IUserRepository
 * @package App\Repositories\Contracts
 */
interface IUserRepository extends IRepository
{
    /**
     * Find single user by email
     *
     * @param $email
     * @return User
     */
    public function findByEmail($email);
}