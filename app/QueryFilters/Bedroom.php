<?php

namespace App\QueryFilters;

class Bedroom extends Filter
{

    protected function applyFilters($builder)
    {   
        return request($this->filterName()) == 5 ? 
            $builder->where('beds', '>', request($this->filterName())) : 
            $builder->where('beds',request($this->filterName()));
    }

}