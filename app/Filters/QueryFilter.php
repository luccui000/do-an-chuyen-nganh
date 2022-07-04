<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected Request $request;
    protected Builder $builder;
    protected array $fillable = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        $this->fillable = $this->getModelFillable();

        foreach ($this->filters() as $name => $value) {
            if(method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }
    }
    public function filters()
    {
        return $this->request->all();
    }
    public function getModelFillable()
    {
        $model = $this->builder->getModel();
        return $model->getSearchable() ?? [];
    }
}
