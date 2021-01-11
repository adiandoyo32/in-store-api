<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResourceCollection;
use App\Traits\ApiResponse;
use DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        // return response()->json([
        //     'data' => $categories,
        // ]);
        return (new CategoryResourceCollection($categories))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->description = $request->description;
            $category->save();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        return $this->createdApiResponse($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
