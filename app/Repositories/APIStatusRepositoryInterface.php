<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface APIStatusRepositoryInterface
{
    public function __construct(Model $model);
    public function index();
}