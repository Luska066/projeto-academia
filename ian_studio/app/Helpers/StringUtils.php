<?php

namespace App\Helpers;

class StringUtils
{
    public static function unmaskMoney($maskedValue)
    {
        // Remove non-numeric characters
        $unmaskedValue = preg_replace('/[^0-9]/', '', $maskedValue);

        // Convert to float and return
        return (float) $unmaskedValue / 100;
    }

    public static function formatBRL($value)
    {
        // Format the value with two decimal places and a currency symbol
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
