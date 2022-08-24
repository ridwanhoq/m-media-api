<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModelRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterApiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateModelRequest $request)
    {
        try {

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            if ($user) {
                // return 
            }
        } catch (Exception $error) {
            
        }
    }
}
