<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OneStopSla\Core\Domain\Models\Item;
use OneStopSla\Core\Domain\Models\Lend;
use OneStopSla\Core\Domain\ViewModels\GetKeranjangViewModel;
use OneStopSla\Core\Persistence\UseCases\GetAllItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\AvailableItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\GetKeranjangItemsUseCase;
use OneStopSla\Core\Persistence\UseCases\SearchItemsUseCase;

use Illuminate\Support\Facades\Session;

class PeminjamsController extends Controller
{
    /**
     * @var GetAllItemsUseCase
     *
     * Use Case to retrieve all items
     */
    protected $allItemsUc;
    /**
     * @var AvailableItemsUseCase
     *
     * Use Case to retreive available items to lend
     */
    protected $availableItemsUc;
    /**
     * @var SearchItemsUseCase
     *
     * Use Case to search items
     */
    protected $searchItemsUc;
    /**
     * @var GetKeranjangItemsUseCase
     *
     * Use Case to get items in keranjang
     */
    protected $getKeranjangUc;

    /**
     * PeminjamsController constructor.
     * @param GetAllItemsUseCase $allItemsUc
     * @param AvailableItemsUseCase $availableItemsUc
     * @param SearchItemsUseCase $searchItemsUc
     * @param GetKeranjangItemsUseCase $getKeranjangUc
     */
    public function __construct(GetAllItemsUseCase $allItemsUc, AvailableItemsUseCase $availableItemsUc, SearchItemsUseCase $searchItemsUc, GetKeranjangItemsUseCase $getKeranjangUc)
    {
        $this->allItemsUc = $allItemsUc;
        $this->availableItemsUc = $availableItemsUc;
        $this->searchItemsUc = $searchItemsUc;
        $this->getKeranjangUc = $getKeranjangUc;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param Request $request
     * @return mixed
     */
    public function addItemToKeranjang(Request $request) {
        $item = [$request->item];

        if (!$request->session()->get('keranjang', false)) {
            $request->session()->put('keranjang', $item);
        } else {
            $request->session()->push('keranjang', $request->item);
        }

        return $request->session()->get('keranjang');;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function keranjangPage(Request $request)
    {
//        Keranjang items gotten from shared view variable in App\Http\View\Composers class
        return view('peminjam.keranjang');
    }

    public function historyPeminjaman()
    {
        $lends = Lend::where('users_id', Auth::user()->id)->get();

        return view('peminjam.history-peminjaman', ['lends' => $lends]);
    }


}
