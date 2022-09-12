<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    use BaseApiTrait;

    public function __invoke(Request $request)
    {
        // ?? Validation

        try {
            $user = User::where([
                'email' => $request->email,
                // 'password' => Hash::make($request->password)
            ])->first();

            if (empty($user)) {
                return $this->handleResponse(
                    $this->apiNoDataError('User'),
                    404
                );
            }

            return $this->handleResponse(
                "User logged in successfully.",
                200,
                $user->createToken($user->email)->plainTextToken
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }
}
