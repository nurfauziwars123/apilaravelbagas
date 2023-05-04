<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\TranResource;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiModel::all();
        // return response()->json(['data' => $transaksi]);
        return TranResource::collection($transaksi);
    }

    public function input(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_transaksi' => 'required',
            'tgl_transaksi' => 'required',
            'total_bayar' => 'required',
            'id_user' => 'required',
            'id_barang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada Kesalahan',
                'data' =>   $validator->errors()
            ]);
        }
        $input = $request->all();
        $transaksi = TransaksiModel::create($input);

        $success['no_transaksi'] = $transaksi->no_transaksi;

        return response()->json([
            'success' => true,
            'message' => 'Sukses Input Transaksi',
            'data' => $success
        ]);
    }
    public function print_pdf()
    {
    	$transaksi = TransaksiModel::all();
 
    	$pdf = \PDF::loadview('transaksipdf',['pegawai'=>$transaksi]);
    	return $pdf->download('laporan-pegawai-pdf');
    }
}
