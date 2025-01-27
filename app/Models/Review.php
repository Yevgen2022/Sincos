<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{

    use HasFactory, Notifiable;

    //SoftDeletes;

    protected $fillable = [

        'user_id',
        'product_id',
        'review',
        'user_rating', //user evaluation of the product
        'created_at',
        'updated_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {

        return $this->belongsTo(Product::class);

    }

// Додаємо метод для отримання кількості відгуків для продукту
    public static function countReviewsForProduct($productId)
    {
        return self::where('product_id', $productId)->count();
    }

// Метод для отримання середнього рейтингу для продукту
    public static function averageRatingForProduct($productId)
    {
        return self::where('product_id', $productId)->avg('user_rating');
    }


}