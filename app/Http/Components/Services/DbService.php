<?php

namespace App\Http\Components\Services;

use Illuminate\Database\Eloquent\Model;

class DbService
{

    public function randomOrCreate($model = null)
    {
        if ($model instanceof Model) {
            return $model::count() <= 0 ? $this->createRecord($model) : $model::all()->random();
        }

        return;
    }

    public function firstOrCreate($model = null)
    {

        if ($model instanceof Model) {
            return $model::count() <= 0 ? $this->createRecord($model) : $model::first();
        }

        return;
    }

    public function createRecord($model = null)
    {

        if ($model instanceof Model) {
            $model::factory()->create();
        }

        return;
    }

    


}
