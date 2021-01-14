<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::paginate();
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $product = new Product;
            $product->id = Uuid::uuid4()->toString();
            $product->name = $request->name;
            $product->slug = Str::slug($request->name, '-');
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->image = $request->image;
            $product->save();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        return $product;
    }

    public function find(Product $product)
    {
        return $product;
    }

    public function findById($productId)
    {
        return Product::where('id', $productId)
            ->firstOrFail();
    }

    public function update($request, Product $product)
    {
        try {
            DB::beginTransaction();

            $product->name = $request->name;
            $product->slug = Str::slug($request->name, '-');
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->image = $request->image;
            $product->save();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        return $product;
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }
}
