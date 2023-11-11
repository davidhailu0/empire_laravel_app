<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use Validator;

class ProductController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::all();
    return $this->sendResponse(ProductResource::collection($products), 'Products Retrieved Successfully.');
  } /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function create()
  {

  } /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $product = Product::create($input);

    return $this->sendResponse(new ProductResource($product), 'Product Created Successfully.');
  } /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function show($id)
  {
    $product = Product::find($id);

    if (is_null($product)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new ProductResource($product), 'Product Retrieved Successfully.');
  } /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function edit(Request $request, $product)
  {
    return $this->sendResponse("Your ID is $product", "Works");
    //
  } /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function update(Request $request, $id)
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }
    $product = Product::find($id);
    $product->name = $input['name'];
    $product->detail = $input['detail'];
    $product->save();

    return $this->sendResponse(new ProductResource($product), 'Product Updated Successfully.');
  } /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function destroy($id)
  {
    $product = Product::find($id);
    $product->delete();

    return $this->sendResponse([], 'Product Deleted Successfully.');
  }
}