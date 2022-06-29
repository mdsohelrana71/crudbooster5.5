<?php

namespace App\QueryFilters;

class Store extends Filter
{

    protected function applyFilters($builder)
    {   
     return request($this->filterName()) == 3 ? 
        $builder->where('floors', '>', request($this->filterName())) : 
        $builder->where('floors',request($this->filterName()));
    }

}