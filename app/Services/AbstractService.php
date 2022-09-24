<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService implements ServiceInterface
{
    protected $model_name;

    public function __construct(string $model_name)
    {
        $this->model_name = $model_name;
    }

    /**
     * @param $params
     * @return Builder|Model|object|null
     */
    public function create($params)
    {
        $model = new $this->model_name();

        $model->fill($params)->save();

        return $model;
    }

    /**
     * @param $id
     * @param $params
     * @return Builder|Model|object|null
     */
    public function update($id, $params)
    {
        $model = $this->find($id);

        $model->fill($params)->save();

        return $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model_name::destroy($id);
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function delete(array $ids)
    {
        return $this->model_name::whereIn('id', $ids)
            ->delete();
    }

    /**
     * @param $id
     * @return Builder|Model|object|null
     */
    public function find($id)
    {
        return $this->model_name::find($id);
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return $this->model_name::get();
    }

    /**
     * @param $skip
     * @param $take
     * @return mixed
     */
    public function skipTakeQuery($skip, $take)
    {
        return $this->model_name::skip($skip)
            ->take($take);
    }

    /**
     * @param $args
     * @param $params
     * @return mixed
     */
    public function createOrUpdate($args, $params)
    {
        $model = $this->model_name::query()
            ->firstOrNew($args);

        $model->fill($params)->save();

        return $model;
    }

}
