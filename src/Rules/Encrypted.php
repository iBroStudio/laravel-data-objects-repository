<?php

namespace IBroStudio\DataRepository\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Crypt;

class Encrypted implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isEncrypted($value)) {
            $fail('The :attribute must be encrypted.');
        }
    }

    private function isEncrypted(string $value): bool
    {
        try {
            Crypt::decryptString($value);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
