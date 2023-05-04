<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_barang' => $this->id_barang,
            'kode_barang' => $this->kode_barang,
            'nama_barang' => $this->nama_barang,
            'expired_date' => $this->expired_date,
            'jumlah_barang' => $this->jumlah_barang,
            'satuan' => $this->satuan,
            'harga_satuan' => $this->harga_satuan,
            'image' => $this->image
        ];
    }
}
