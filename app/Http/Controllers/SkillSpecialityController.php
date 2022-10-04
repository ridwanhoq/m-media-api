<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillSpecialityStoreRequest;
use App\Http\Resources\SkillSpecialityResource;
use App\Models\SkillSpeciality;
use Exception;
use Illuminate\Http\Request;

class SkillSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        try {
            $data = SkillSpecialityResource::collection(
                SkillSpeciality::latest()->paginate(10)
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
            $this->handleError($error);
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
    public function store(SkillSpecialityStoreRequest $request)
    {
        try {
            return $this->handleResponse(
                $this->apiDataInserted($this->item_name),
                201,
                [
                    "records"   =>  new SkillSpeciality(
                        SkillSpeciality::create($request->all())
                    )
                ]
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkillSpeciality  $skillSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $result = SkillSpeciality::find($id);

            if (empty($result)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            $data   = new SkillSpecialityResource($result);

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
     * @param  \App\Models\SkillSpeciality  $skillSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillSpeciality $skillSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkillSpeciality  $skillSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $skill = SkillSpeciality::find($id);

            if (empty($skill)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            $skill->update($request->all());

            $skill_data = new SkillSpecialityResource($skill);

            return $this->handleResponse(
                $this->apiDataUpdated($this->item_name),
                200,
                $skill_data
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkillSpeciality  $skillSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $skill = SkillSpeciality::find($id);

            if (empty($skill)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            $skill->delete();

            return $this->handleResponse(
                $this->apiDataDeleted($this->item_name),
                200
            );
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }
}
