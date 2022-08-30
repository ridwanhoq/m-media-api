<?php

namespace App\Http\Components;

trait PaginationTrait
{
    public function getPaginatedPages($pagination_data){
            return [
                "total" 	    => $pagination_data->total(),
                "first"         => $pagination_data->url(1),
                "last"          => $pagination_data->url($pagination_data->lastPage()),
                "prev"          => $pagination_data->previousPageUrl(),
                "next"          => $pagination_data->nextPageUrl(),
                "current_page"  => $pagination_data->currentPage(),
                "per_page"      => $pagination_data->perPage(),
            ];
    }




}
