<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryIndexController extends Controller
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



    private $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }


    public function __invoke()
    {

        /**
         * Get all categories from table categories
         */

          $number = 4;
          $categories = $this->categoryService->getCategoriesPaginateService($number);
        /**
         * creates an array with the 'categories' key, which is available in the Blade template.
         */

        return view('Category.index', compact('categories'));
    }




}
