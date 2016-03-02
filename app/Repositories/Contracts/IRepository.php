<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 7:18 PM
 */

namespace App\Repositories\Contracts;

use App\AppModel;
use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface IRepository
 * @package App\Repositories\Contracts
 */
interface IRepository
{
    /**
     * Retrieve model name
     *
     * @return string
     */
    public function model();

    /**
     * Allowed repo relations array
     *
     * @return array
     */
    public function relations();

    /**
     * Get current repository model
     *
     * @return Builder
     */
    public function getModelBuilder();

    /**
     * Indicates if the model exists.
     * @return bool
     */
    public function exists();

    /**
     * @return AppModel
     */
    public function getModel();

    /**
     * Get the table associated with the repository model.
     * @return string
     */
    public function getTable();

    /**
     * @return Builder
     * @throws RepositoryException
     */
    public function makeModel();

    /**
     * @param        $find
     * @param string $column
     * @param array $columns
     *
     * @return AppModel
     */
    public function show($find, $column = 'id', array $columns = ['*']);

    /**
     * @param        $find
     * @param array $with
     * @param string $column
     * @param array $columns
     * @return AppModel
     */
    public function findWith($find, array $with = [], $column = 'id', array $columns = ['*']);

    /**
     * @param        $find
     * @param string $column
     * @param array $columns
     * @return AppModel
     */
    public function find($find, $column = 'id', array $columns = ['*']);

    /**
     * @param        $slug
     * @param array $columns
     * @param string $column
     * @return AppModel
     */
    public function findBySlug($slug, array $columns = ['*'], $column = 'slug');

    /**
     * @param        $find
     * @param string $column
     * @param array $columns
     * @return AppModel
     */
    public function get($find, $column = 'id', array $columns = ['*']);

    /**
     * @param        $find
     * @param string $column
     * @param array $with
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getWith($find, $column = 'id', array $with = [], array $columns = ['*']);

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
    );

    /**
     * @param       $value
     * @param array $in
     * @return mixed
     */
    public function searchFor($value, array $in);

    /**
     * @param array $attributes
     * @return bool
     * @throws RepositoryException
     */
    public function canFind(array $attributes);

    /**
     * @param array $input
     *
     * @return AppModel
     */
    public function create(array $input);

    /**
     * @param array $input
     * @param int $id
     * @param string $attribute
     *
     * @return AppModel
     */
    public function update(array $input, $id, $attribute = 'id');

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * @param int $id
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function restore($id);

    /**
     * @param array $ids
     * @return mixed
     */
    public function searchIds(array $ids);
}