<?php


namespace OneStopSla\Core\Persistence\Repositories;

use Illuminate\Database\Eloquent\Model;
use OneStopSla\Core\Domain\Models\Item;
use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;

class ItemsRepository extends BaseRepository implements ItemsRepositoryInterface
{
    public function __construct(Item $model)
    {
        parent::__construct($model);
    }

    public function createItem($item)
    {
        return $this->create($item);
    }

    public function updateItem($item, $id)
    {
        return $this->update($item, $id);
    }
}
