<?php namespace App\Repositories;

use App\AppModel;
use App\Exceptions\RepositoryException;
use App\Repositories\Contracts\IPaginateRepository;
use App\Services\Contracts\IFiltersInputService;
use App\Services\Contracts\IRelationsInputService;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;
use Input;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository
{

    /**
     * @var App
     */
    protected $app;

    /**
     * @var IFiltersInputService
     */
    protected $filter;

    /**
     * @var IRelationsInputService
     */
    protected $relation;

    /**
     * @var Builder
     */
    protected $model;

    /**
     * @var AppModel
     */
    protected $modelInstance;

    /**
     * @var bool
     */
    protected $isSluggable = false;

    /**
     * @param App $app
     * @param IFiltersInputService $filter
     * @param IRelationsInputService $relation
     *
     * @throws RepositoryException
     */
    public function __construct(App $app, IFiltersInputService $filter, IRelationsInputService $relation)
    {
        $this->app = $app;
        $this->filter = $filter;
        $this->relation = $relation;
        $this->makeModel();
    }

    /**
     * Retrieve model name
     *
     * @return string
     */
    abstract public function model();

    /**
     * Allowed repo relations array
     *
     * @return array
     */
    abstract public function relations();

    /**
     * Get current repository model
     *
     * @return Builder
     */
    public function getModelBuilder()
    {
        return $this->model;
    }

    /**
     * Indicates if the model exists.
     * @return bool
     */
    public function exists()
    {
        return $this->modelInstance->exists;
    }

    /**
     * @return AppModel
     */
    public function getModel()
    {
        return $this->modelInstance;
    }

    /**
     * Get the table associated with the repository model.
     * @return string
     */
    public function getTable()
    {
        return $this->modelInstance->getTable();
    }

    /**
     * model is using SoftDeleteTrait
     *
     * @param AppModel $model
     *
     * @return bool
     */
    protected function hasDeleteTrait(AppModel $model)
    {
        return method_exists($model, 'withTrashed');
    }

    /**
     * @return Builder
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $this->modelInstance = $this->app->make($this->model());
        if (!$this->modelInstance instanceof AppModel) {
            throw new RepositoryException("Class {$this->model()} must be an instance of App\\AppModel");
        }

        if ($this->modelInstance instanceof SluggableInterface) {
            $this->isSluggable = true;
        }

        return $this->model = $this->modelInstance->newQuery();
    }

    /**
     * @param AppModel $model
     * @param int $per_page
     * @param array $filters
     * @param array $columns
     * @return array
     */
    public function paginate(AppModel $model, $per_page = 15, array $filters = [], array $columns = ['*'])
    {
        $this->model = $this->onlyTrashed($model->newQuery());
        $this->model = $this->relation->apply($this->model, $this);

        if ($this instanceof IPaginateRepository) {
            $this->model = $this->filter->apply($this->model, $this, $filters);
        }

        return $this->model->order()->paginate($per_page, $columns)->toArray();
    }

    /**
     * Check if user can see trashed records, model has trashed trait and check is requests
     * asking for trashed records
     *
     * @param Builder $model
     *
     * @return bool
     */
    protected function onlyTrashed(Builder $model)
    {
        if (Input::get('trashed') === 'true') {
            if ($this->hasDeleteTrait($model) /*AND May::i( Perm::TRASHED )*/) {
                $model = $model->onlyTrashed();
            }
        }

        return $model;
    }

    /**
     * @param        $find
     * @param string $column
     * @param array $columns
     *
     * @return AppModel
     */
    public function show($find, $column = 'id', array $columns = ['*'])
    {
        $this->model = $this->where($column, $find);
        $this->model = $this->relation->apply($this->model, $this);

        return $this->model->firstOrFail($columns);
    }

    /**
     * @param        $find
     * @param array $with
     * @param string $column
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findWith($find, array $with = [], $column = 'id', array $columns = ['*'])
    {
        return $this->with($find, $column, $with)->firstOrFail($columns);
    }

    /**
     * @param        $find
     * @param string $column
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($find, $column = 'id', array $columns = ['*'])
    {
        return $this->where($column, $find)->firstOrFail($columns);
    }

    /**
     * @param        $slug
     * @param array $columns
     * @param string $column
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findBySlug($slug, array $columns = ['*'], $column = 'slug')
    {
        return $this->find($slug, $column, $columns);
    }

    /**
     * @param        $find
     * @param string $column
     * @param array $columns
     * @return AppModel
     */
    public function get($find, $column = 'id', array $columns = ['*'])
    {
        return $this->where($column, $find)->get($columns);
    }

    /**
     * @param        $find
     * @param string $column
     * @param array $with
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getWith($find, $column = 'id', array $with = [], array $columns = ['*'])
    {
        return $this->with($find, $column, $with)->get($columns);
    }

    /**
     * @param        $find
     * @param string $column
     * @param string $order_by
     * @param bool $ascending
     * @param array $with
     * @param array $columns
     * @return mixed
     */
    public function getOrdered(
        $find,
        $column = 'id',
        $order_by = 'id',
        $ascending = true,
        array $with = [],
        array $columns = ['*']
    ) {
        $order = $ascending ? 'ASC' : 'DESC';

        return $this->with($find, $column, $with)
            ->orderBy($order_by, $order)
            ->get($columns);
    }

    /**
     * @param       $value
     * @param array $in
     * @return mixed
     */
    public function searchFor($value, array $in)
    {
        foreach ($in as $key) {
            $this->model = $this->model->orWhere($key, $value);
        }

        return $this->model->firstOrFail();
    }

    /**
     * @param array $attributes
     * @return bool
     * @throws RepositoryException
     */
    public function canFind(array $attributes)
    {
        $this->model = $this->makeModel();
        foreach ($attributes as $key => $value) {
            $this->model = $this->model->where($key, $value);
        }

        return $this->model->count() > 0;
    }

    /**
     * @param array $input
     *
     * @return AppModel
     */
    public function create(array $input)
    {
        return $this->modelInstance->create($input);
    }

    /**
     * @param array $input
     * @param int $id
     * @param string $attribute
     *
     * @return AppModel
     */
    public function update(array $input, $id, $attribute = 'id')
    {
        $input = array_intersect_key($input, array_flip($this->modelInstance->getFillable()));
        $model = $this->find($id, $attribute);
        $model->update($input);

        return $model;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        if ($this->hasDeleteTrait($this->modelInstance)) {
            return $this->destroy($id);
        }

        return $this->modelInstance->destroy($id);
    }

    /**
     * @param int $id
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function restore($id)
    {
        if ($this->hasDeleteTrait($this->modelInstance)) {
            $this->modelInstance = $this->modelInstance->withTrashed()->findOrFail($id);

            return $this->modelInstance->restore();
        }

        throw new RepositoryException("{$this->modelInstance->getTable()} has not deleted records");
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function searchIds(array $ids)
    {
        return $this->model->whereIn('id', $ids)->lists('id');
    }

    /**
     * @param $id
     *
     * @return mixed
     * @throws \Exception
     */
    protected function destroy($id)
    {
        $this->modelInstance = $this->modelInstance->withTrashed()->findOrFail($id);

        if ($this->modelInstance->trashed()) {
            return $this->modelInstance->forceDelete();
        }

        return $this->modelInstance->delete();
    }

    /**
     * @param $find
     * @param $column
     * @param $with
     * @return Builder
     */
    protected function with($find, $column, $with)
    {
        $this->model = $this->where($column, $find);
        $this->model = $this->relation->apply($this->model, $this, $with);

        return $this->model;
    }

    /**
     * @param $column
     * @param $value
     * @return Builder
     */
    protected function where($column, $value)
    {
        $this->model = $this->makeModel()->where($column, $value);

        return $this->model;
    }

}