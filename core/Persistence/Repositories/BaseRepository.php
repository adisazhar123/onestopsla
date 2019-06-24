<?php


namespace OneStopSla\Core\Persistence\Repositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use OneStopSla\Core\Persistence\Repositories\Contracts\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    /**
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, $id) : bool
    {
        return $this->find($id)->update($attributes);
    }
    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), $orderBy = 'id', $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }
    /**
     * @param int $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }
    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }
    /**
     * @param array $data
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginateArrayResults(array $data, int $perPage = 50)
    {
        $page = request()->get('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($data, $offset, $perPage, false),
            count($data),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query()
            ]
        );
    }
    /**
     * @param int $id
     * @return bool
     */
    public function delete($id) : bool
    {
        return $this->model->find($id)->delete();
    }

    public function whereIn($column, array $ids)
    {
        return $this->model->whereIn($column, $ids)->get();
    }

    public function with(array $relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    public function get()
    {
        return $this->model->get();
    }

    public function where(array $attributes)
    {
        $this->model = $this->model->where($attributes);

        return $this;
    }
}
