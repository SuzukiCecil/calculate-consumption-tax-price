<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject;

use DateTimeImmutable;

interface ConsumptionTax
{
    public static function canApply(DateTimeImmutable $date): bool;
    public function taxRate(): int;
}