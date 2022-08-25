<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
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
    public function store(CreateUserRequest $request)
    {
        try {

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            if ($user) {
                return response()->json([
                    'test'  => 'est'
                ]);
            }
        } catch (Exception $error) {
            return $error;
        }
    }
}
