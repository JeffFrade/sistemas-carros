<?php

namespace App\Helpers;

class StringHelper
{
    public static function formatCurrency(float $currency)
    {
        return number_format($currency, 2, ',', '.');
    }

    public static function hashPassword(?string $password)
    {
        if (empty($password)) {
            return null;
        }

        return \Hash::make($password);
    }
}
