<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryDeleteController extends Controller
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

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {

        $this->categoryService->categoryDeleteService($id);


        return redirect()->route('category')
            ->with('success', 'Category successfully deleted!');
    }


}
