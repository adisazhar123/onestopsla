<?php


namespace OneStopSla\Core\Persistence\Repositories;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTime;
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

    public function getAllItems()
    {
        return $this->all();
    }

    public function getAvailableItems($end_date = null)
    {
        $end = $end_date == null ? now() : $end_date;

        $items = Item::with(['lends' => function ($q) use ($end) {
            $q->distinct();
            $q->whereDate('end_date_time', '<', $end);
        }])->get();

        return $items;
    }

    /**
     * @param string $keywords
     * @param string $category
     * @param CarbonInterface|null $startDate
     * @param CarbonInterface|null $endDate
     * @return array
     */
    public function searchItems($keywords = '', $category = '', CarbonInterface $startDate, CarbonInterface $endDate)
    {
        $items = Item::where(function ($q) use ($keywords, $category) { //search keyword by title
            $q->where('category', 'like', '%' . $category . '%');
            $q->where('title', 'like', '%' . $keywords . '%');
        })
        ->orWhere(function ($q) use ($keywords, $category) { //search keyword by description
            $q->where('description', 'like', '%' . $keywords . '%');
            $q->where('category', 'like', '%' . $category . '%');
        })
        ->with('lends')
        ->orderBy('title', 'asc')
        ->get();

        return $items;
    }
}
