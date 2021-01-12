<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::paginate(10);
    }

    public function find(Category $category)
    {
        return $category;
    }

    public function findById($categoryId)
    {
        return Category::where('id', $categoryId)
            ->firstOrFail();
    }
}