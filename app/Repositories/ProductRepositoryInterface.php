<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * The Interface of Product Repository
 */
interface ProductRepositoryInterface
{
    public function __construct(Model $model);
    public function index();
    public function show($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}