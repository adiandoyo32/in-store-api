<?php

namespace App\Services\Interfaces;

use App\Models\Category;

interface CategoryServiceInterface
{
    public function getAllCategory();

    public function storeCategory($request);

    public function findCategory(Category $category);

    public function findCategoryById($category);

    public function updateCategory($request, Category $category);

    public function deleteCategory(Category $category);
}