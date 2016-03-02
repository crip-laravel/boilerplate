<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 4:30 PM
 */

namespace App\Services\Contracts;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface IRelationsInputService
 * @package App\Services\Contracts
 */
interface IRelationsInputService
{

    /**
     * @param Builder $builder
     * @param Repository $repository
     * @param array $relations
     * @return Builder
     */
    public function apply(Builder $builder, Repository $repository, array $relations = []);
}