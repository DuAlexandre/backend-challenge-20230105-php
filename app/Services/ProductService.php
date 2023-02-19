<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;

/**
 * The Service of Product
 */
class ProductService
{

    /**
     * The interface of repository
     */
    private $repository;
    

    /**
     * Constructor
     */
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * The method index of repository
     */
    public function index()
    {
        return $this->repository->index();
    }


    /**
     * The method show of repository
     */
    public function show($id)
    {
        return $this->repository->show($id);
    }


    /**
     * The method store of repository
     */
    public function store(array $data)
    {
        return $this->repository->store($data);
    }


    /**
     * The method update/patch of repository
     */
    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }


    /**
     * The method destroy of repository
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}