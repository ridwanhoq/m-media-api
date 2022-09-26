<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\SkillStoreRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    private $item_name;

    public function __construct()
    {
        $this->item_name = "Skill";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $data = SkillResource::collection(
                Skill::latest()->paginate(10)
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
    public function store(SkillStoreRequest $request)
    {
        try {
            return $this->handleResponse(
                $this->apiDataInserted($this->item_name),
                201,
                [
                    "records"   =>  new SkillResource(
                        Skill::create($this->inputFields())
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
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $result = Skill::find($id);

            if (empty($result)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            $data   = new SkillResource($result);

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
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $skill = Skill::find($id);

            $skill->update($request->all());

            $skill_data = new SkillResource($skill);

            return $this->handleResponse($this->apiDataUpdated($this->item_name), 200, $skill_data);
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $skill = Skill::find($id);

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

    protected function inputFields(): array
    {
        return [
            'title'         => request()->title,
            'description'   => request()->description,
        ];
    }
}
