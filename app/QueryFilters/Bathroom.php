<?php

namespace App\QueryFilters;

class Bathroom extends Filter
{

    protected function applyFilters($builder)
    {   
        return request($this->filterName()) == 4 ? 
            $builder->where('baths', '>', request($this->filterName())) : 
            $builder->where('baths',request($this->filterName()));
        
    }

}