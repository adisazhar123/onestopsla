<?php


namespace App\Http\View\Composers;


use Illuminate\Support\Facades\Session;
use OneStopSla\Core\Domain\ViewModels\GetKeranjangViewModel;
use OneStopSla\Core\Persistence\UseCases\GetKeranjangItemsUseCase;
use Illuminate\View\View;

class KeranjangComposer
{
    protected $getKeranjangUc;

    public function __construct(GetKeranjangItemsUseCase $getKeranjangUc)
    {
        $this->getKeranjangUc = $getKeranjangUc;
    }

    public function getKeranjang()
    {
        $itemIds = Session::get('keranjang', null);
        if ($itemIds == null) $itemIds = [];

        $items = $this->getKeranjangUc->handle($itemIds);
        $viewModel = new GetKeranjangViewModel($items, $itemIds);

        return $viewModel;
    }

    public function compose(View $view)
    {
        $keranjang = $this->getKeranjang();
        $view->with('keranjang', $keranjang);
    }

}
