<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BarangDetailResource;
use App\Http\Resources\BarangResource;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $barang = BarangModel::all();
        // return response()->json(['data' => $barang]);
        return BarangResource::collection($barang);
    }

    public function show($id_barang)
    {
        $barang = BarangModel::findOrFail($id_barang);
        return new BarangDetailResource($barang);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'expired_date' => 'required',
            'jumlah_barang' => 'required',
            'satuan' => 'required',
            'harga_satuan' => 'required',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        if ($request->file) {
            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();

            Storage::putFileAs('image', $request->file, $fileName . '.' . $extension);

            $request['image'] = $fileName . '.' . $extension;
        }


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada Kesalahan',
                'data' =>   $validator->errors()
            ]);
        }

        $input = $request->all();
        $barang = BarangModel::create($input);

        $success['kode_barang'] = $barang->kode_barang;

        return response()->json([
            'success' => true,
            'message' => 'Sukses Input Barang',
            'data' => $success
        ]);
    }
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
