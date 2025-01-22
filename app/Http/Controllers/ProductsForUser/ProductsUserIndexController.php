<?php

namespace App\Http\Controllers\ProductsForUser;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsUserIndexController extends Controller
{
public function index(){
    return view('ProductsForUser.index');
}

}