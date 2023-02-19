<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class ProductRepositoryEloquent implements ProductRepositoryInterface
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

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function store( array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $update = $this->model->find($id);
        $update->update($data);
        return $update;
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete;
    }
}