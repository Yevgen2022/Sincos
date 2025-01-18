<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_excluding_vat_in_minor_units',
        'vat_rate',
        'category_id',
    ];


    /**
     * Відношення "Багато до одного" з категорією
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class); // Продукт належить певній категорії
    }
}
