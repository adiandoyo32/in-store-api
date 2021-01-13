<?php

namespace App\Repositories\Interfaces;

use App\Models\Cart;

interface CartRepositoryInterface
{
    public function all();

    public function store($request);

    public function findUserCart($userId);

    public function addProduct(Cart $cart, $request);

    public function findById($product);

    public function update($request, Cart $product);

    public function delete(Cart $product);
}