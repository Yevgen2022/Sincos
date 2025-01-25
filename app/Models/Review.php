<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{

    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [

        'user_id',
        'product_id',
        'rating',
        'review',
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


}