<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();

    public function store($request);

    public function find(Product $product);

    public function findById($product);

    public function update($request, Product $product);

    public function delete(Product $product);
}