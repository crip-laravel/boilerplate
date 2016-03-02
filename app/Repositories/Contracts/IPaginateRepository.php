<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 3:33 PM
 */

namespace App\Repositories\Contracts;

use App\AppModel;

/**
 * Interface IPaginateRepository
 * @package App\Repositories\Contracts
 */
interface IPaginateRepository
{
    /**
     * Allowed pagination filters array
     *
     * @return array
     */
    public function paginateFilters();

    /**
     * @param AppModel $model
     * @param int $per_page
     * @param array $filters
     * @param array $columns
     * @return array
     */
    public function paginate(AppModel $model, $per_page = 15, array $filters = [], array $columns = ['*']);

}