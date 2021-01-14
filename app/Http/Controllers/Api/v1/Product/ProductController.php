<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Traits\ApiResponse;

class ProductController extends Controller
{
    use ApiResponse;

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all()->toArray();

        return $this->okApiResponse($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->store($request)->toArray();

        return $this->okApiResponse($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $product = $this->productRepository->findById($productId)->toArray();

        return $this->okApiResponse($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $this->productRepository->update($request, $product)->toArray();

        return $this->okApiResponse($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = $this->productRepository->delete($product);

        return $this->okApiResponse(null);
    }
}
