<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_log' => $this->id_log,
            'waktu' => $this->waktu,
            'aktivitas' => $this->aktivitas,
            'id_user' => $this->id_user,
        ];
    }
}
