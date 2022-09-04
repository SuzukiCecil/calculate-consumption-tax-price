<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject;

use DateTimeImmutable;

class FirstConsumptionTax implements ConsumptionTax
{
    private const START = "1989-04-01";
    private const END = "1997-03-31";
    private const TAX_RATE = 3;

    public static function canApply(DateTimeImmutable $date): bool
    {
        return (is_null(self::START) || self::START <= $date->format("Y-m-d")) && (is_null(self::END) || self::END >= $date->format("Y-m-d"));
    }

    public function taxRate(): int
    {
        return self::TAX_RATE;
    }
}