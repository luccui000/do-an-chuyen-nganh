<?php

namespace App\Traits;

trait HasSortable
{
    public function sort($query)
    {
        $data = explode(',', $query);
        $column = $data[0];

        if(isset($data[1]) && in_array($data[1], ['asc', 'desc']))
            $orderBy = $data[1];
        else
            $orderBy = 'asc';

        return $this->builder->orderBy($column, $orderBy);
    }
}
