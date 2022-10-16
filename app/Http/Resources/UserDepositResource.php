<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDepositResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"        => $this->id,
            "user_id"   => $this->user_id,
            "amount"    => (double) $this->amount,
            "status"    => $this->getStatus($this->status) ?? null
        ];
    }
}
