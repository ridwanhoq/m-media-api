<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillSpecialityResource;
use App\Models\SkillSpeciality;
use App\Models\SkillSubSpeciality;
use Exception;
use Illuminate\Http\Request;

class SkillSubSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store( $request)
    {
        try {
            return $this->handleResponse(
                $this->apiDataInserted($this->item_name),
                201,
                [
                    "records"   =>  new SkillSpecialityResource(
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
     * @param  \App\Models\SkillSubSpeciality  $skillSubSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(SkillSubSpeciality $skillSubSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkillSubSpeciality  $skillSubSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillSubSpeciality $skillSubSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkillSubSpeciality  $skillSubSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillSubSpeciality $skillSubSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkillSubSpeciality  $skillSubSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillSubSpeciality $skillSubSpeciality)
    {
        //
    }
}
