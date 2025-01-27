<?php

namespace App\Http\Controllers\CardDetail;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class CardDetailIndexController
{
    public function __invoke(Request $request, $id)
    {
        $product = Product::find($id);
        $reviewCount = Review::countReviewsForProduct($id);
        $averageRating = Review::averageRatingForProduct($id);

        return view('CardDetail.index', compact('product', 'reviewCount', 'averageRating'));
    }



}