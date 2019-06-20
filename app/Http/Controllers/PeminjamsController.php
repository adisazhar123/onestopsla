<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use OneStopSla\Core\Persistence\UseCases\AllItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\AvailableItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\SearchItemsUseCase;

class PeminjamsController extends Controller
{
    protected $allItemsUc;
    protected $availableItemsUc;
    protected $searchItemsUc;

    public function __construct(AllItemsUseCase $allItemsUc, AvailableItemsUseCase $availableItemsUc, SearchItemsUseCase $searchItemsUc)
    {
        $this->allItemsUc = $allItemsUc;
        $this->availableItemsUc = $availableItemsUc;
        $this->searchItemsUc = $searchItemsUc;
    }

    public function getAvailableAllItems(Request $request)
    {
        $keyword = $request->keyword;
        $category = $request->category;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        //        parse date string to date object
        if(empty($startDate) || empty($endDate)) {
            $startDate = Carbon::now();
            $endDate = Carbon::now();
        } else {
            $startDate = Carbon::create($startDate);
            $endDate = Carbon::create($endDate);
        }

        $items = $this->searchItemsUc->handle($keyword, $category, $startDate, $endDate)
                ->setPath($request->url());;

        return view('peminjam.barang', ['items' => $items, 'start_date' => date_format($startDate, 'd/m/Y'), 'end_date' => date_format($endDate, 'd/m/Y')]);
    }

}
