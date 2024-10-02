<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct(){
       $product = DB::table('products')->get();
       return response([
           'product' => $product,
           'message' => 'success',
           'status' => 200,
       ]);
    }
}
