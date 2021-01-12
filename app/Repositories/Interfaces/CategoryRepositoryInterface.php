<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();

    public function find(Category $category);

    public function findById($category);
}