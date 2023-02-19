<?php

namespace App\Services;

use App\Repositories\APIStatusRepositoryInterface;

class APIStatusService
{
    private $repository;
    
    public function __construct(APIStatusRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }
}