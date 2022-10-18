<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDepositResource extends JsonResource
{

    public static $mode = "single";

    public static function setMode($mode){
        self::$mode = $mode;
        return __CLASS__;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        if(self::$mode === "user_deposit_process"){
            return collect(
                $this->all_data
            )->only([
                "id",
                "amount",
                "status"
            ]);
        }
    
        return $this->all_data();
       
    }

    private function all_data(){
         return [
            "id"        => $this->id,
            "user_id"   => $this->user_id,
            "amount"    => (double) $this->amount,
            "status"    => $this->getStatus($this->status) ?? null
        ];
    }



}
