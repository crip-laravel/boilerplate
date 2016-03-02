<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 3:13 PM
 */

namespace App\Services\Helpers;

use App\Repositories\Repository;
use App\Services\Contracts\IInputService;
use App\Services\Contracts\IRelationsInputService;
use Illuminate\Database\Eloquent\Builder;
use Input;

/**
 * Class RelationsInputService
 * @package App\Services
 */
class RelationsInputService implements IRelationsInputService
{
    /**
     * @var Repository
     */
    protected $repository;

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
     * @param Builder $builder
     * @param Repository $repository
     * @param array $relations
     * @return Builder
     */
    public function apply(Builder $builder, Repository $repository, array $relations = [])
    {
        $this->repository = $repository;

        return $builder->with($this->getRelations($relations));
    }

    /**
     * @param array $relations
     * @return array
     */
    private function getRelations(array $relations = [])
    {
        $with = is_array(Input::get('with')) ? Input::get('with') : $this->inputService->decode('with');

        if (count($relations) > 0) {
            $with = $relations;
        }

        $result = [];
        $relations = $this->repository->relations();
        foreach ($with as $key => $value) {
            if (in_array($key, $relations) || in_array($value, $relations)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

}