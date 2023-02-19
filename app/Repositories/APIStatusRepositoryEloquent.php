<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class APIStatusRepositoryEloquent implements APIStatusRepositoryInterface
{
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }
}