<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel{


    public function scopeLatestOrder($query){
        return $query->orderBy('id');
    }

    public function scopeLoggedUser($query){
        return $query->where('user_id', auth()->user()->id);
    }

}