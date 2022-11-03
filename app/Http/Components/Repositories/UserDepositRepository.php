<?php

namespace App\Http\Components\Repositories;

use App\Models\UserDeposit;

class UserDepositRepository
{

    public function checkLoggedUserHasNoPendingRequests()
    {
        return UserDeposit::loggedUser()->PendingReqeusts()->count();
    }

    







}
