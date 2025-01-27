<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */

    public function getReviews($id)
    {
        // Отримуємо відгуки для конкретного продукту
        $reviews = Review::where('product_id', $id)->get();

        $product = Product::findOrFail($id);
        $averageRating = Review::averageRatingForProduct($id);
        $reviewCount = Review::countReviewsForProduct($id);



        // Повертаємо Blade-шаблон, що містить компонент для відгуків
        return view('components.review-card', compact('product','reviews','averageRating','reviewCount'));
    }


}
