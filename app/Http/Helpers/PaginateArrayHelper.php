<?php

namespace App\Http\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginateArrayHelper
{

    public static function handle($processedItems, $itemsPerPage)
    {
        $perPage = $itemsPerPage;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($processedItems);
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        return $paginatedItems;
    }
}
