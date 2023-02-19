<?php

namespace App\Services;

use App\Repositories\APIStatusRepositoryInterface;

/**
 * The Service of API Status
 */
class APIStatusService
{
    /**
     * The interface of repository
     */
    private $repository;
    

    /**
     * Constructor
     */
    public function __construct(APIStatusRepositoryInterface $repository)
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
}