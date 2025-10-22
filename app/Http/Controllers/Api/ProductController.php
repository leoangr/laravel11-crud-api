<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        if ($product->count() > 0) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Founded',
                'data' => ProductResource::collection($product)
            ], 200);

        } else {
            return response()->json([
                'status' => 0,
                'message' => 'No record available'
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required',
                'price' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $product = Product::create($request->all());

            return response()->json([
                'status' => 1,
                'message' => 'Product Created Successfully',
                'data' => new ProductResource($product)
            ], 201);
            
        } catch (Throwable $th) {
            return response()->json([
                'status' => 1,
                'message' => 'Failed while create product',
                'errors' => $th->getMessage()
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            
            $product = Product::findOrFail($id);
            return response()->json([
                'status' => '1',
                'message'=> 'Data founded',
                'data' => new ProductResource($product)
            ], 200);

        } catch (Throwable $th) {
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Founded',
                'errors' => $th->getMessage()
            ], 400);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required',
                'price' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $product = Product::findOrFail($id);
            $product->update($request->all());

            return response()->json([
                'status' => 1,
                'message' => 'Product Update Successfully',
                'data' => new ProductResource($product)
            ], 200);

        } catch (Throwable $th) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed while update',
                'errors' => $th->getMessage()
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Deleted successfully'
            ], 200);

        } catch (Throwable $th) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed while Deleted',
                'errors' => $th->getMessage()
            ], 400);
        }

    }
}
