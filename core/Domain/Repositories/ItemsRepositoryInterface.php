<?php

namespace OneStopSla\Core\Domain\Repositories;

use Carbon\CarbonInterface;

interface ItemsRepositoryInterface
{
    public function createItem($item);
    public function updateItem($item, $id);
    public function getAllItems();
    public function getAvailableItems($end_date = null);
    public function searchItems($keywords = '', $category = '', CarbonInterface $startDate, CarbonInterface $endDate);
    public function searchNumerousItems(array $items);
}
