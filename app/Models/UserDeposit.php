<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeposit extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * public static properties
     */
    public static $pending_status = 1;
    
    

    public static $rules =[
        "user_id"   => "required",
        "amount"    => "required",
        "status"    => "required"        
    ];

    public static $process_deposit_rules =  [
        "amount"    => "required",
        "status"    => "required"
    ];

    /**
     * Scope functions
     */
    public function scopeRequestsByStatus($query, $status){
        return $query->where('status', $status);
    }

    public function scopePendingReqeusts($query){
        return $this->scopeRequestsByStatus($query, self::$pending_status);
    }

    /**
     * setting related information
     */

    public function getStatus($value){
        return Setting::get_data_by_index("transaction_statuses_array", $value);
    }

}
