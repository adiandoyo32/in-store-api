<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::paginate();
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $category = Category::firstOrCreate(
                ['name' => $request->name],
                [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name, '-'),
                    'description' => $request->description
                ]
            );

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        return $category;
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

    public function update($request, Category $category)
    {
        try {
            DB::beginTransaction();

            $category->name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->description = $request->description;
            $category->save();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        return $category;
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }
}