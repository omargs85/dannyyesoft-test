<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'S_Nombre' => $this->S_Nombre,
            'S_Apellidos' => $this->S_Apellidos,
            'email' => $this->email,
            'created_at' => $this->created_at,
        ];
    }
}
