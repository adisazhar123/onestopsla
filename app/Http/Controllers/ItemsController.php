<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use OneStopSla\Core\Domain\Models\Item;
use OneStopSla\Core\Domain\Models\Lend;
use OneStopSla\Core\Persistence\UseCases\AllItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\AvailableItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\CreateItemUseCase;
use OneStopSla\Core\Persistence\UseCases\UpdateItemUseCase;

class ItemsController extends Controller
{
//    User defined use cases
    protected $createItemUc;
    protected $updateItemUc;
    protected $allItemsUc;
    protected $availableItemsUc;

    public function __construct(CreateItemUseCase $createItemUc, UpdateItemUseCase $updateItemUc, AllItemsUseCase $allItemsUc, AvailableItemsUseCase $availableItemsUc)
    {
        $this->createItemUc = $createItemUc;
        $this->updateItemUc = $updateItemUc;
        $this->allItemsUc = $allItemsUc;
        $this->availableItemsUc = $availableItemsUc;
    }

    //    [HttpPost, Route("/items")]
    public function createItem(CreateItemRequest $request)
    {
//        Get validated data from request object
        $validatedData = $request->validated();

        try {
            $itemResponse = $this->createItemUc->handle($validatedData);
        } catch (\Exception $e) {
            return response()->json(['error_message' => $e->getMessage()], 500);
        }

        return response()->json($itemResponse, 201);
    }

    public function updateItem($id, UpdateItemRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $itemResponse = $this->updateItemUc->handle($validatedData, $id);
        } catch (\Exception $e) {
            return response()->json(['error_message' => $e->getMessage(), 500]);
        }

        return response()->json($itemResponse, 200);
    }

    public function allItems()
    {
        $items = $this->allItemsUc->handle();

        return ['items' => $items];
    }

    public function getAvailableItems()
    {
        $items = $this->availableItemsUc->handle();

        return ['items' => $items];
    }

    public function searchItems()
    {
//        $start_date = '';
//        $end_date = '';
//        $items = Item::whereDoesntHave('lends', function ($q) use ($start_date, $end_date) {
//            $q->whereDate('start_date_time', '>=', Carbon::create($start_date));
//            $q->whereDate('end_date_time', '<=', Carbon::create($end_date));
//        })
//            ->get();
//
//        return $items;
    }

}
