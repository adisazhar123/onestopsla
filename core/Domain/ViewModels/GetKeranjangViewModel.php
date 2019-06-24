<?php


namespace OneStopSla\Core\Domain\ViewModels;

use Illuminate\Support\Facades\Log;
use OneStopSla\Core\Domain\Helpers\CategoriesHelper;

class GetKeranjangViewModel
{
    /**
     * Holds the items in the keranjang (non duplicated)
     *
     * @var $itemsInKeranjang
     */
    protected $itemsInKeranjang;

    /**
     * Holds the item ids in the keranjang (duplicated)
     *
     * @var $itemsInKeranjang
     */
    protected $itemIds;

    public function __construct($itemsInKeranjang, $itemIds)
    {
        $this->itemsInKeranjang = $itemsInKeranjang;
        $this->itemIds = $itemIds;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        if (!$this->itemsInKeranjang->count())
            return true;
        return false;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->itemsInKeranjang;
    }

    public function groupItemsById()
    {
        $processedItems = collect();

        foreach ($this->itemsInKeranjang as $item)
        {
            $item->quantity = 0;
            $processedItems->put(strval($item->id), $item);
        }

        foreach ($this->itemIds as $itemId)
        {
            $processedItems->get(strval($itemId))->quantity++;
        }

        return $processedItems;
    }

    public function itemsCount()
    {
        return count($this->itemIds);
    }
}
