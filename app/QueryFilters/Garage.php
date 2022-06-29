<?php

namespace App\QueryFilters;

class Garage extends Filter
{

    protected function applyFilters($builder)
    {   
        return request($this->filterName()) == 4 ? 
            $builder->where('garages', '>', request($this->filterName())) : 
            $builder->where('garages',request($this->filterName()));
    }

}