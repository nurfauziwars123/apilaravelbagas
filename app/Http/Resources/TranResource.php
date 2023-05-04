<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_transkasi' => $this->id_transaksi,
            'no_transaksi' => $this->no_transaksi,
            'tgl_transaksi' => $this->tgl_transaksi,
            'total_bayar' => $this->total_bayar,
            'id_user' => $this->id_user,
            'id_barang' => $this->id_barang,
        ];
    }
}
