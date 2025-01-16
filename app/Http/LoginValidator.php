<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginValidator
{
    /**
     * Checking login and password.
     *
     * @param array $data
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */

    public function validate(array $data)
    {
        // Створення валідатора
        $validator = Validator::make($data, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Якщо валідація не проходить
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
