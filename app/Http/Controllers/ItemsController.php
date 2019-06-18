<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use OneStopSla\Core\Persistence\UseCases\CreateItemUseCase;
use OneStopSla\Core\Persistence\UseCases\UpdateItemUseCase;

class ItemsController extends Controller
{
//    User defined use cases
    protected $createItemUc;
    protected $updateItemUc;

    public function __construct(CreateItemUseCase $createItemUc, UpdateItemUseCase $updateItemUc)
    {
        $this->createItemUc = $createItemUc;
        $this->updateItemUc = $updateItemUc;
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
}
