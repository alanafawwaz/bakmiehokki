<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::select('id', 'name', 'tanggal', 'ketersediaan')
                        ->orderBy('tanggal', 'desc')
                        ->paginate(5);

        return view('admin.stock.index', compact('stocks'));
    }
}
