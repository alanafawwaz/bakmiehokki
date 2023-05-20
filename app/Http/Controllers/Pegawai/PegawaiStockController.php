<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequest;
use Illuminate\Http\Request;
use App\Models\Stock;
use Exception;
use Alert;

class PegawaiStockController extends Controller
{
    public function index()
    {
        $stocks = Stock::select('id', 'name', 'ketersediaan', 'tanggal')
                        ->latest()
                        ->paginate(5);

        return view('pegawai.stock.index', compact('stocks'));
    }

    public function create()
    {
        return view('pegawai.stock.create');
    }

    public function store(StockRequest $request)
    {
        Stock::create([
            'name' => $request->name,
            'ketersediaan' => $request->ketersediaan,
            'tanggal' => $request->tanggal,
        ]);

        Alert::success('Mantap', 'Data berhasil ditambahkan');
        return redirect('/pegawai/stock');
    }

    public function edit($id)
    {
        try {
            $stock = Stock::where('id', $id)->first();

            if (!$stock) {
                Alert::error('Maaf', 'Data tidak ditemukan');
                return redirect('/pegawai/stock');
            }

            return view('pegawai.stock.edit', compact('stock'));
        } catch (Exception $e) {
            Alert::error('Error', 'Terjadi Kesalahan');
            return redirect('/pegawai/stock');
        }
    }

    public function update(StockRequest $request, $id)
    {
        try {
            $stock = Stock::where('id', $id)->first();

            if (!$stock) {
                Alert::error('Maaf', 'Data tidak ditemukan');
                return redirect('/pegawai/stock');
            }

            $stock->update([
                'name' => $request->name,
                'ketersediaan' => $request->ketersediaan,
                'tanggal' => $request->tanggal,
            ]);

            Alert::success('Mantap', 'Data berhasil diupdate');
            return redirect('/pegawai/stock');
        } catch (Exception $e) {
            Alert::error('Error', 'Terjadi Kesalahan');
            return redirect('/pegawai/stock');
        }
    }

    public function destroy($id)
    {
        try {
            $stock = Stock::where('id', $id)->first();

            if (!$stock) {
                Alert::error('Maaf', 'Data tidak ditemukan');
                return redirect('/pegawai/stock');
            }

            $stock->delete();

            Alert::success('Mantap', 'Data berhasil dihapus');
            return redirect('/pegawai/stock');
        } catch (Exception $e) {
            Alert::error('Error', 'Terjadi Kesalahan');
            return redirect('/pegawai/stock');
        }
    }
}
