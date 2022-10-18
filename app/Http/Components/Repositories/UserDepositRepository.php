<?php

namespace App\Http\Components\Repositories;

use App\Models\UserDeposit;

class UserDepositRepository
{

    public function checkUserHasNoPendingRequests($userId)
    {

        $totalPendingRequestsByUserId = UserDeposit::TotalRequestsByStatus()
            ->count();
            
    }
}
