<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangsController extends Controller
{
    public function resetKeranjang(Request $request)
    {
        $request->session()->forget('keranjang');
        return redirect()->back()->with('success', 'Keranjang berhasil di-reset.');
    }
}
