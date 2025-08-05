<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckHandler implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Regex que exige @ no início, não aceita espaços, apenas letras, números, _ e -
        if (!preg_match('/^@[a-zA-Z0-9_-]+$/', $value)) {
            $fail('O handler deve começar com @ e conter apenas letras, números, _ e - sem espaços!');
        }
    }
}
