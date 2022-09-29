<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use App\Http\Components\PaginationTrait;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use BaseApiTrait, PaginationTrait;

    private $item_name;

    public function __construct()
    {
        $this->item_name = "Task";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tasks_data = TaskResource::collection(
                Task::latest()->paginate(10)
            );

            return $this->handleResponse(
                $this->apiDataListed($this->item_name),
                200,
                [
                    "links" => $this->getPaginatedPages($tasks_data),
                    "records" => $tasks_data
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
    public function store(Request $request)
    {
        try {
            return $this->handleResponse(
                $this->apiDataInserted($this->item_name),
                201,
                [
                    "records"   =>  new TaskResource(
                        Task::create($request->all())
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
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Task::find($id);

            if (empty($result)) {
                return $this->handleResponse(
                    $this->apiNoDataError($this->item_name)
                );
            }

            $data   = new TaskResource($result);

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
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

}
