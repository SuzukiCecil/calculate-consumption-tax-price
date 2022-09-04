<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject;

use DateTimeImmutable;

class ForthConsumptionTax implements ConsumptionTax
{
    private const START = "2019-10-01";
    private const END = null;
    private const TAX_RATE = 8;

    public static function canApply(DateTimeImmutable $date): bool
    {
        return (is_null(self::START) || self::START <= $date->format("Y-m-d")) && (is_null(self::END) || self::END >= $date->format("Y-m-d"));
    }

    public function taxRate(): int
    {
        return self::TAX_RATE;
    }
}