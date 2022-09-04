<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject;

use DateTimeImmutable;

class SecondConsumptionTax implements ConsumptionTax
{
    private const START = "1997-04-01";
    private const END = "2014-03-31";
    private const TAX_RATE = 5;

    public static function canApply(DateTimeImmutable $date): bool
    {
        return (is_null(self::START) || self::START <= $date->format("Y-m-d")) && (is_null(self::END) || self::END >= $date->format("Y-m-d"));
    }

    public function taxRate(): int
    {
        return self::TAX_RATE;
    }
}