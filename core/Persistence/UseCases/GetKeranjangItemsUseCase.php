<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Models\Item;
use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;
use OneStopSla\Core\Domain\ViewModels\GetKeranjangViewModel;

class GetKeranjangItemsUseCase
{
    protected $items;
    protected $itemsRepo;

    public function __construct(ItemsRepositoryInterface $itemsRepo)
    {
        $this->itemsRepo = $itemsRepo;
    }

    public function handle($items)
    {
        $this->items = $items;

        $itemIds = $this->items;
        if ($itemIds == null) $itemIds = [];
        $items = $this->itemsRepo->searchNumerousItems($itemIds);

        return $items;
    }
}
