<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryEditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id): \Illuminate\Contracts\Support\Renderable
    {

        /**
         * Get category from table categories by id
         */
        $category = Category::findOrFail($id);

        /**
         * We return the view with the transfer of category data.
         */

        return view('category.edit', compact('category'));
    }




}
