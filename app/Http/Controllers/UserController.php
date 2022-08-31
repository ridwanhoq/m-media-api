<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use App\Http\Components\PaginationTrait;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\crf;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use PaginationTrait, BaseApiTrait;

    private $item_name  = "User";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            
            $users          = User::paginate(10);

            $users_data     = UserResource::collection($users);

            $result = [
                "links"     => $this->getPaginatedPages($users_data),
                "records"   => $users_data
            ];

            return $this->handleResponse($result, $this->apiDataListed($this->item_name));

        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        try {
            
            $userInputs = User::input_fields();

            $user       = User::create($userInputs);

            return $this->handleResponse($user, $this->apiDataInserted($this->item_name));

        } catch (Exception $error) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crf  $crf
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
            
            $result  = new UserResource( $user );

            return $this->handleResponse($result, $this->apiDataShown($this->item_name));


        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crf  $crf
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crf  $crf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crf  $crf
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
