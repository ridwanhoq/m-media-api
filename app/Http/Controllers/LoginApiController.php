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

    private $item_name  = "User";

    public function __invoke(Request $request)
    {
        try {

            $email      = $request->email;
            $password   = Hash::make($request->password);

            $user       = User::where([
                                'email'     => $email,
                                'password'  => $password
                            ])->first();

            if (empty($user)) {
                return $this->handleError([
                    'code'  => 402,
                    'msg'   => $this->apiNoDataError($this->item_name)
                ]);
            }
// return $user->createToken(config('app.name'))->plainTextToken;
            $data['api_token']  = $user->createToken(config('app.name'))->plainTextToken;
            $data['user']       = $user;

            return $this->handleResponse($data, "User logged in successfully.");
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }
}
