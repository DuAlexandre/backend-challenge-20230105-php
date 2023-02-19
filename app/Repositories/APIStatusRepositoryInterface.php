<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * The Interface os API Status Repository
 */
interface APIStatusRepositoryInterface
{
    public function __construct(Model $model);
    public function index();
}