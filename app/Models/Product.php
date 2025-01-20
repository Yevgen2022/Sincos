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
        return $this->belongsTo(Category::class); // The product belongs to a certain category
    }
    public function formattedPrice(): string
    {

        return number_format($this->price_excluding_vat_in_minor_units / 100, 2, ',', ' ');
    }
    public function setFormattedPrice(string $priceFromForm): void
    {
        // Видалення пробілів і заміна коми на точку для правильної конвертації
        $price = str_replace(' ', '', $priceFromForm); // видаляємо пробіли
        $price = str_replace(',', '.', $price); // заміняємо кому на точку

//        if (!is_numeric($price)) {
//            throw new InvalidArgumentException('Ціна має бути числом у форматі "1234.56" або "1234,56".');
//        }



        // Перетворення ціни в мінорні одиниці (наприклад, копійки)
        $this->price_excluding_vat_in_minor_units = (int) round((float) $price * 100);
    }




}
