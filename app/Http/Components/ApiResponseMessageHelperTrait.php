<?php

namespace App\Http\Components;

trait ApiResponseMessageHelperTrait{

    public function apiDatumRequired($item_name){
        return $this->apiActionMessage($item_name, ' required');
    }

    public function apiDataRequired($items = []){
        $item_names = [];
        foreach($items as $key => $item){
            $item_names[$key] = $this->add_comma_no_underscore($item);
        }

        return $this->apiDatumRequired($item_names);
    }


    public function apiDataNotAuthorized($message = null){
        return 'Sorry, you are not authorized'.$message;
    }


    public function apiDataListed($item_name){
        return $this->apiActionMessage($item_name, ' listed');
    }

    public function apiDataShown($item_name){
        return $this->apiActionMessage($item_name, ' shown');
    }

    public function apiDataInserted($item_name, $reverse = ""){
        return $this->apiActionMessage($item_name, $reverse.' inserted');
    }

    public function apiDataUpdated($item_name, $reverse = ""){
        return $this->apiActionMessage($item_name, $reverse.' updated');
    }

    public function apiDataDeleted($item_name, $reverse = ""){
        return $this->apiActionMessage($item_name, $reverse.' deleted');
    }


    
    public function apiDataNotInserted($item_name){
        $this->apiDataInserted($item_name, "not");
    }

    public function apiDataNotUpdated($item_name){
        $this->apiDataUpdated($item_name, "not");
    }

    public function apiDataNotDeleted($item_name){
        $this->apiDataDeleted($item_name, "not");
    }

    
    public function apiNoDataError($item_name){
        return $item_name.' data not found!';
    } 

    
    

}