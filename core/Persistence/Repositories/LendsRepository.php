<?php


namespace OneStopSla\Core\Persistence\Repositories;


use Illuminate\Database\Eloquent\Model;
use OneStopSla\Core\Domain\Models\Lend;
use OneStopSla\Core\Domain\Repositories\LendsRepositoryInterface;

class LendsRepository extends BaseRepository implements LendsRepositoryInterface
{
    public function __construct(Lend $model)
    {
        parent::__construct($model);
    }

    public function createLend($lendData, $items)
    {
        $lend = $this->create($lendData);
        $lend->items()->attach($items);
        return $this;
    }

    public function getLendsByUserId($userId)
    {
        $attributes = ['users_id' => Auth::user()->id];
        $lends = $this->findBy($attributes);

        return $lends;
    }

    public function getAllLends()
    {
        return $this->all();
    }

    public function findLendWithItems(array $attributes, array $relations)
    {
        $lends = $this->where($attributes)->with($relations)->get();

        return $lends;
    }
}
