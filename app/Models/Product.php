<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
'name', 'price', 'category_id', // add other fields
];

/**
* Відношення "Багато до одного" з категорією
*/
public function category()
{
return $this->belongsTo(Category::class); // Продукт належить певній категорії
}
}
