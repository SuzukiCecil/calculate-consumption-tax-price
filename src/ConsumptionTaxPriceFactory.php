<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice;

use DateTimeImmutable;
use InvalidArgumentException;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\FirstConsumptionTax;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\Price;

class ConsumptionTaxPriceFactory
{
    public static function create(
        int $priceWithoutConsumptionTax,
        DateTimeImmutable $date = new DateTimeImmutable(),
    ): Price {
        if ($priceWithoutConsumptionTax < 0) {
            throw new InvalidArgumentException("Minus price given.");
        }
        return new Price($priceWithoutConsumptionTax, new FirstConsumptionTax());
    }
}