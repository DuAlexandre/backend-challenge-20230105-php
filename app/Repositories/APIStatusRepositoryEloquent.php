<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

/**
 * The Eloquent Repository of API Status
 */
class APIStatusRepositoryEloquent implements APIStatusRepositoryInterface
{
    /**
     * The model reference
     */
    protected $model;
    

    /**
     * Constructor
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * Get all from Model
     * @return all of the models from the database.
     */
    public function index()
    {
        return $this->model->all();
    }
}