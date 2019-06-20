<?php

namespace OneStopSla\Core\Persistence\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function create(array $attributes);
    public function update(array $attributes, $id);
    public function all($columns = array('*'), $orderBy = 'id', $sortBy = 'asc');
    public function find($id);
    public function findOneOrFail($id);
    public function findBy(array $data);
    public function findOneBy(array $data);
    public function findOneByOrFail(array $data);
    public function paginateArrayResults(array $data, int $perPage = 50);
    public function delete($id);
}
