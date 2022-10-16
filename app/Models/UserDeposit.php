<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeposit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $rules =[
        
    ];

    public function getStatus($value){
        return Setting::get_data_by_index("transaction_statuses_array", $value);
    }

}
