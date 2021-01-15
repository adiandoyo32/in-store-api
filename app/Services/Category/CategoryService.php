<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->all()->toArray();
    }

    public function storeCategory($request)
    {
        return $this->categoryRepository->store($request)->toArray();
    }

    public function findCategory(Category $category)
    {
        return $this->categoryRepository->find($category)->toArray();
    }

    public function findCategoryById($categoryId)
    {
        if (!is_int($categoryId)) {
            throw new NotFoundHttpException();
        }
        return $this->categoryRepository->findById($categoryId)->toArray();
    }

    public function updateCategory($request, Category $category)
    {
        return $this->categoryRepository->update($request, $category)->toArray();
    }

    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }
}
