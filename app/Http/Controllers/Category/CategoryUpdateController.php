<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryUpdateController
{
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        // Валідація введених даних
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Знаходимо категорію по ID
        $category = Category::findOrFail($id);

        // Оновлюємо назву категорії
        $category->name = $validated['name'];
        $category->save();

        // Переадресовуємо назад на сторінку категорій з повідомленням
        return redirect()->route('category')
            ->with('success', 'The category has been updated successfully!');
    }
}
