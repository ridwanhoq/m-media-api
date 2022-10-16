<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDepositResource;
use App\Models\UserDeposit;
use Exception;
use Illuminate\Http\Request;

class UserDepositController extends Controller
{
    private $item_name;

    public function __construct()
    {
        $this->item_name    = "User deposit";
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = UserDepositResource::collection(
                UserDeposit::latest()->paginate(10)
            );

            return $this->handleResponse(
                $this->apiDataListed($this->item_name),
                200,
                [
                    "links" => $this->getPaginatedPages($data),
                    "records" => $data
                ]
            );
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try {


            
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDeposit  $userDeposit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = UserDeposit::find($id);

            if (empty($result)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            $data   = new UserDepositResource($result);

            return $this->handleResponse(
                $this->apiDataShown($this->item_name),
                200,
                $data
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDeposit  $userDeposit
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDeposit $userDeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDeposit  $userDeposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDeposit $userDeposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDeposit  $userDeposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeposit $userDeposit)
    {
        //
    }
}
