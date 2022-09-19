<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Lang;

class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            "name_en"       => $this->name ?? "",
            "name_bn"       => $this->name_bn ?? "",
            "email"         => $this->email ?? ""
        ];
    }
}
