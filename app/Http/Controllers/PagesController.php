<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function adminLendsPage()
    {
        return view('admin.peminjaman');
    }

}
