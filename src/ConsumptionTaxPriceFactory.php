<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice;

use DateTimeImmutable;
use InvalidArgumentException;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\FirstConsumptionTax;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\ForthConsumptionTax;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\Price;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\SecondConsumptionTax;
use SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject\ThirdConsumptionTax;
use Exception;

class ConsumptionTaxPriceFactory
{
    /**
     * @param int $priceWithoutConsumptionTax
     * @param DateTimeImmutable $date
     * @return Price
     * @throws Exception
     */
    public static function create(
        int $priceWithoutConsumptionTax,
        DateTimeImmutable $date = new DateTimeImmutable(),
    ): Price {
        if ($priceWithoutConsumptionTax < 0) {
            throw new InvalidArgumentException("Minus price given.");
        }
        $consumptionTax = match (true) {
            FirstConsumptionTax::canApply($date) => new FirstConsumptionTax(),
            SecondConsumptionTax::canApply($date) => new SecondConsumptionTax(),
            ThirdConsumptionTax::canApply($date) => new ThirdConsumptionTax(),
            ForthConsumptionTax::canApply($date) => new ForthConsumptionTax(),
            default => throw new Exception("Consumption tax can`t apply."),
        };
        return new Price($priceWithoutConsumptionTax, $consumptionTax);
    }
}