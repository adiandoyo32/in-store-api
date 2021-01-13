<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartRepository implements CartRepositoryInterface
{
    public function all()
    {
        return Cart::all();
    }

    public function store($request)
    {
        
    }

    public function findUserCart($userId)
    {
        $cart = Cart::where('user_id', $userId)->first();

        if (!$cart) {
            try {
                DB::beginTransaction();
    
                $cart = new Cart;
                $cart->user_id = $userId;
                $cart->save();
    
                DB::commit();
            } catch (\Throwable $th) {
                throw $th;
                DB::rollback();
            }
        }
        return $cart;
    }

    public function addProduct(Cart $cart, $request)
    {
        $cartDetail = new CartDetail();
    }

    public function findById($product)
    {
        
    }

    public function update($request, Cart $product)
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

    public function delete(Cart $product)
    {
        return $product->delete();
    }
}
