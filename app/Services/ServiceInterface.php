<?php

namespace App\Services;

/**
 * Class ServiceInterface
 * @package App\Services
 */
interface ServiceInterface
{
    /**
     * @param $params
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function create($params);

    /**
     * @param $id
     * @param $params
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function update($id, $params);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param array $ids
     * @return mixed
     */
    public function delete(array $ids);

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function find($id);

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * @param $skip
     * @param $take
     * @return mixed
     */
    public function skipTakeQuery($skip, $take);

}
