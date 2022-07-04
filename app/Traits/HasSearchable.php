<?php

namespace App\Traits;

trait HasSearchable
{
    public function s($searchTerm = '')
    {
        foreach ($this->fillable as $attribute)
        {
            $this->builder = $this->builder->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        }
        return $this->builder;
    }
}
