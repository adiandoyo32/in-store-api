<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();

    public function store($request);

    public function find(Category $category);

    public function findById($categoryId);

    public function update($request, Category $category);

    public function delete(Category $category);
}