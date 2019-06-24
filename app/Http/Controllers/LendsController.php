<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use OneStopSla\Core\Domain\Models\Lend;
use OneStopSla\Core\Persistence\UseCases\CreateLendUseCase;
use OneStopSla\Core\Persistence\UseCases\GetAllLendsUseCase;
use OneStopSla\Core\Persistence\UseCases\GetLendWithItemsUseCase;

class LendsController extends Controller
{
    protected $createLendUc;
    protected $getAllLendsUc;
    protected $getLendWithItemsUc;

    public function __construct(CreateLendUseCase $createLendUc, GetAllLendsUseCase $getAllLendsUc, GetLendWithItemsUseCase $getLendWithItemsUseCase)
    {
        $this->getAllLendsUc = $getAllLendsUc;
        $this->createLendUc = $createLendUc;
        $this->getLendWithItemsUc = $getLendWithItemsUseCase;
    }

    public function lanjutkanPeminjaman()
    {
        return view('peminjam.peminjaman');
    }

    public function createPeminjaman(Request $request)
    {
        $itemIds = Session::get('keranjang', null);
        if ($itemIds == null) $itemIds = [];

        $lendData = $request->all();
        $lendData['users_id'] = Auth::user()->id;


        $this->createLendUc->handle($lendData, $itemIds);
//        delete the keranjang
        $request->session()->forget('keranjang');

        return redirect("peminjam/keranjang")->with("success", "Peminjaman berhasil diajukan!");
    }

    public function getPeminjamans()
    {
        $lends = $this->getAllLendsUc->handle();

        return ['data' => $lends];
    }

    public function findLendWithItems($lendId)
    {
        $attributes = ['id' => $lendId];
        $relations = ['items'];

        $lendsItems = $this->getLendWithItemsUc->handle($attributes, $relations);

        return $lendsItems;

    }

}
