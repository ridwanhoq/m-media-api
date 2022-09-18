<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"    => $this->id,
            "name"  => $this->name ?? "",
            "email" => $this->email ?? "",
            "test"  => __('Test')
        ];
    }
}
