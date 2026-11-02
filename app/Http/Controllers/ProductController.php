<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view(
            "product.addproduct",
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $ValidateData = $request->validate([
            'productname' => 'required|string|max:255|unique:products,productname',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'catid' => 'required|exists:categories,categoryid',
        ]);

        Product::create($ValidateData);

        return redirect("/product/list");
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view(
            'product.editproduct',
            compact('product', 'categories')
        );
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'productname' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'productname')
                    ->ignore($product->productid, 'productid'),
            ],

            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'catid' => 'required|exists:categories,categoryid',
        ]);

        $product->update($validatedData);

        return redirect()
            ->route('product.list')
            ->with('success', 'Product updated successfully.');
    }

    public function index()
    {
        $products = Product::with('cat')->get();

        return view(
            'product.listproduct',
            compact('products')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW DELETE CONFIRMATION PAGE
    |--------------------------------------------------------------------------
    */

    public function delete(Product $product)
    {
        return view(
            'product.delete',
            compact('product')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function destroy(int $productid)
    {
        $product = Product::findOrFail($productid);

        $product->delete();

        return redirect()
            ->route('product.list')
            ->with('success', 'Product deleted successfully!');
    }

    /*
    |--------------------------------------------------------------------------
    | API: GET ALL PRODUCTS
    |--------------------------------------------------------------------------
    */

    public function apiIndex()
    {
        $products = Product::with('cat')->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully',
            'data' => $products
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | API: CREATE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'productname' => 'required|string|max:255|unique:products,productname',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'catid' => 'required|exists:categories,categoryid',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product->load('cat')
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | API: GET PRODUCT BY ID
    |--------------------------------------------------------------------------
    */

    public function apiShow(int $productid)
    {
        $product = Product::with('cat')->find($productid);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully',
            'data' => $product
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | API: SEARCH PRODUCT BY NAME
    |--------------------------------------------------------------------------
    */

    public function apiSearch(Request $request)
    {
        $validatedData = $request->validate([
            'productname' => 'required|string|max:255',
        ]);

        $products = Product::with('cat')
            ->where(
                'productname',
                'like',
                '%' . $validatedData['productname'] . '%'
            )
            ->get();

        return response()->json([
            'success' => true,
            'message' => $products->isEmpty()
                ? 'No products found'
                : 'Products found successfully',
            'data' => $products
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | API: UPDATE PRODUCT BY ID
    |--------------------------------------------------------------------------
    */

    public function apiUpdate(Request $request, int $productid)
    {
        $product = Product::find($productid);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'productname' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'productname')
                    ->ignore($product->productid, 'productid'),
            ],

            'price' => 'sometimes|required|numeric|min:0',
            'quantity' => 'sometimes|required|integer|min:0',
            'description' => 'sometimes|nullable|string',
            'catid' => 'sometimes|required|exists:categories,categoryid',
        ]);

        if (empty($validatedData)) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide at least one field to update'
            ], 422);
        }

        $product->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product->fresh()->load('cat')
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | API: DELETE PRODUCT BY ID
    |--------------------------------------------------------------------------
    */

    public function apiDestroy(int $productid)
    {
        $product = Product::find($productid);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
            'data' => [
                'productid' => $productid
            ]
        ], 200);
    }
}
