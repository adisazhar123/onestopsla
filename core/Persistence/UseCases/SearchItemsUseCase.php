<?php


namespace OneStopSla\Core\Persistence\UseCases;


use App\Http\Helpers\PaginateArrayHelper;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use OneStopSla\Core\Domain\Helpers\CategoriesHelper;
use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;

class SearchItemsUseCase
{
    protected $itemsRepo;

    public function __construct(ItemsRepositoryInterface $itemsRepository)
    {
        $this->itemsRepo = $itemsRepository;
    }

    public function handle($keyword, $category, CarbonInterface $startDate, CarbonInterface $endDate)
    {

        $items = $this->itemsRepo->searchItems($keyword, $category, $startDate, $endDate);

//        this variable holds the items available that matches the given keyword and date range
        $processedItems = array();

//        count available items
        foreach ($items as $item)
        {
            $currentItemDefaultQuantity = $item->quantity;
            $itemsCannotUse = 0;

            foreach ($item->lends as $lend)
            {
                $startDateLend = Carbon::create($lend->start_date_time);
                $endDateLend = Carbon::create($lend->end_date_time);
                if ($startDate->between($startDateLend, $endDateLend)) {
                    $itemsCannotUse++;
                } else if ($endDate->between($startDateLend, $endDateLend)) {
                    $itemsCannotUse++;
                } else if ($startDate->isBefore($startDateLend) && $endDate->isAfter($endDateLend)) {
                    $itemsCannotUse++;
                }
            }
//            remove lends property (not needed)
            unset($item->lends);
            $quantityAvailable = $currentItemDefaultQuantity - $itemsCannotUse;

            if ($quantityAvailable) {
                $item->quantity_available = $currentItemDefaultQuantity - $itemsCannotUse;
                $processedItems [] = $item;
            }
            $item->category = CategoriesHelper::toIndonesian($item->category);
        }

        $paginatedItems = PaginateArrayHelper::handle($processedItems, 8);

        return $paginatedItems;
    }
}
