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
            $password   = Hash::make($request->password); //return $password;

            $user       = User::where([
                                'email'     => $email,
                                // 'password'  => $password
                            ])->first();
                            
                
            if (empty($user)) {
                return $this->handleResponse($this->apiNoDataError($this->item_name), 404);
            }

            $data['api_token']  = $user->createToken(config('app.name'))->plainTextToken;
            $data['user']       = $user;

            return $this->handleResponse("User logged in successfully.", 200, $data);
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }
}
