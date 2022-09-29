<?php

namespace App\Models;

use App\Http\Components\API\DateTimeFormatterTrait;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel{

    use DateTimeFormatterTrait;

    public $casts = [
        "created_at"    => "datetime:Y-m-d H:i:s a",
        "updated_at"    => "datetime:Y-m-d H:i:s a"
    ];

    public function getCreatedAtAttribute($value){
        return $this->convertToYmdHisFormat($value);
    }

    public function getUpdatedAtAttribute($value){
        return $this->convertToYmdHisFormat($value);
    }


}