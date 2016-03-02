<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 4:26 PM
 */

namespace App\Services\Contracts;

use App\Exceptions\FilterException;
use App\Repositories\Contracts\IPaginateRepository;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface IFiltersInputService
 * @package App\Services\Contracts
 */
interface IFiltersInputService
{
    /**
     * @param Builder $model
     * @param IPaginateRepository $repository
     * @param array $filters
     *
     * @return Builder
     * @throws FilterException
     */
    public function apply(Builder $model, IPaginateRepository $repository, array $filters);
}