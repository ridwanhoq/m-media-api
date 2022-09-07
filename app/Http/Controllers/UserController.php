<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use App\Http\Components\PaginationTrait;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use PaginationTrait, BaseApiTrait;

    private string $item_name;

    public function __construct()
    {
        $this->item_name = 'User';
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {

            // $users          = User::latest()->paginate(10);

            // $users_data     = UserResource::collection($users);

            // $result = [
            //     "links"     => $this->getPaginatedPages($users_data),
            //     "records"   => $users_data
            // ];

            // return $this->handleResponse($this->apiDataListed($this->item_name), 200, $result);

            $users_data = UserResource::collection(
                User::latest()->paginate(10)
            );

            return $this->handleResponse(
                $this->apiDataListed($this->item_name),
                200,
                [
                    "links" => $this->getPaginatedPages($users_data),
                    "records" => $users_data
                ]
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request)
    {
        try {
            return $this->handleResponse(
                $this->apiDataInserted($this->item_name),
                200,
                [
                    "records"   =>  new UserResource(
                        User::create($this->inputFields())
                    )
                ]
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * @return array<string,string>
     */
    protected function inputFields(): array
    {
        return [
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ];
    }

    /**
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        try {
            $user = User::find($id);

            if (empty($user)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            return $this->handleResponse(
                $this->apiDataShown($this->item_name),
                200,
                new UserResource($user)
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }
}
