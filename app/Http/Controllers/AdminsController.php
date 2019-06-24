<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OneStopSla\Core\Persistence\UseCases\GetAllLendsUseCase;

class AdminsController extends Controller
{
    protected $getAllLendsUc;

    public function __construct(GetAllLendsUseCase $getAllLendsUc)
    {
        $this->getAllLendsUc = $getAllLendsUc;
    }

    public function managePeminjamanPage()
    {
        return view('admin.peminjaman');
    }
}
