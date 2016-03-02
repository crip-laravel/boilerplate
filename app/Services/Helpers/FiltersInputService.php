<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 3:08 PM
 */

namespace App\Services\Helpers;

use App\Exceptions\FilterException;
use App\Repositories\Contracts\IPaginateRepository;
use App\Services\Contracts\IFiltersInputService;
use App\Services\Contracts\IInputService;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class FiltersInputService
 * @package App\Services\Helpers
 */
class FiltersInputService implements IFiltersInputService
{
    /**
     * Filter comparator allowed signs
     *
     * @var array
     */
    private $filter_comparators
        = [
            '=',
            '>',
            '<',
            'like',
        ];

    /**
     * @var array
     */
    private $wrap_in_percents
        = [
            'like'
        ];

    /**
     * @var IInputService
     */
    private $inputService;

    /**
     * @param IInputService $inputService
     */
    public function __construct(IInputService $inputService)
    {
        $this->inputService = $inputService;
    }

    /**
     * @param Builder $model
     * @param IPaginateRepository $repository
     * @param array $filters
     *
     * @return Builder
     * @throws FilterException
     */
    public function apply(Builder $model, IPaginateRepository $repository, array $filters)
    {
        foreach ($this->inputService->decode('filters') as $filter) {
            $model = $this->applyFilter($filter, $model, $repository);
        }

        foreach ($filters as $filter) {
            $model = $this->addFilter($model, $filter);
        }

        return $model;
    }

    /**
     * @param array $filter
     * @param Builder $model
     * @param IPaginateRepository $repository
     *
     * @return Builder
     * @throws FilterException
     */
    private function applyFilter(array $filter, Builder $model, IPaginateRepository $repository)
    {
        if (isset($filter[0]) AND in_array($filter[0], (array)$repository->paginateFilters())) {
            $model = $this->addFilter($model, $filter);
        } else {
            throw new FilterException(get_class($repository) . " Repository filters can contain only " . join(', ',
                    $repository->paginateFilters()) . ' columns');
        }

        return $model;
    }

    /**
     * @param Builder $model
     * @param array $filter
     *
     * @return $this|Builder
     * @throws FilterException
     */
    private function addFilter(Builder $model, array $filter)
    {
        switch (count($filter)) {
            case 2:
                $model = $model->where($filter[0], $this->trim($filter[1]));
                break;
            case 3:
                if (!in_array($filter[1], $this->filter_comparators)) {
                    throw new FilterException('Api filters can contain only ' . join(', ',
                            $this->filter_comparators) . ' comparators');
                }
                $model = $model->where($filter[0], $filter[1], $this->trim($filter[2], $filter[1]));
                break;
        }

        return $model;
    }

    /**
     * @param      $value
     * @param bool $comparator
     *
     * @return string
     */
    private function trim($value, $comparator = false)
    {
        $value = trim($value);
        if (in_array($comparator, $this->wrap_in_percents)) {
            return '%' . $value . '%';
        }

        return $value;
    }
}