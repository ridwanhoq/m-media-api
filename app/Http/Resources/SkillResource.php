<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
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
            "id"            => $this->id,
            "title"         => $this->title ?? "",
            "description"   => $this->description ?? "",
            "created_at"    => $this->convertToYmdhisFormat($this->created_at),
            "updated_at"    => $this->convertToYmdHisFormat($this->updated_at)
        ];
    }
}
