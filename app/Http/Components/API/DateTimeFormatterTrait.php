<?php

namespace App\Http\Components\API;

use Carbon\Carbon;

trait DateTimeFormatterTrait{

    public function convertToYmdHisFormat($dateTime = null, $timeZone = "Asia/Dhaka"){
        return Carbon::parse($dateTime, $timeZone)->format("Y-m-d H:i:s");
    }
}