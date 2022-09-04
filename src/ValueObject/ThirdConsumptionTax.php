<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject;

use DateTimeImmutable;

class ThirdConsumptionTax implements ConsumptionTax
{
    private const START = "2014-04-01";
    private const END = "2019-09-30";
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