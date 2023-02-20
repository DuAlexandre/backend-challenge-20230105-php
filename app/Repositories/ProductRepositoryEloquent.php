<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

/**
 * The Eloquent Repository of Products
 */
class ProductRepositoryEloquent implements ProductRepositoryInterface
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
        $data = $this->model->paginate(20);
        $result = $data->toArray();
        return $result["data"];
    }


    /**
     * Get models by ID
     * @param $id: the ID of Model
     * @return model find
     */
    public function show($id)
    {
        return $this->model->find($id);
    }


    /**
     * Create in model
     * @param $data: the data to be registered.
     * @return the model created. 
     */
    public function store(array $data)
    {
        return $this->model->create($data);
    }


    /**
     * Update in Model
     * @param $id: The Model ID to update.
     * @param $data: The data to update.
     * @return the data updated.
     */
    public function update($id, array $data)
    {
        $update = $this->model->find($id);
        $update->update($data);
        return $update;
    }

    /**
     * Delete in Model
     * @param $id: The Model ID to delete.
     * @return the model to delete.
     */
    public function destroy($id)
    {
        return $this->model->find($id)->delete;
    }
}