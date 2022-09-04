<?php

namespace SuzukiCecil\CalculateConsumptionTaxPrice\ValueObject;

class Price
{
    public function __construct(
        private readonly int $priceWithoutConsumptionTax,
        private readonly ConsumptionTax $consumptionTax,
    ) {
    }

    public function priceWithoutConsumptionTax(): int
    {
        return $this->priceWithoutConsumptionTax;
    }

    public function consumptionTaxPrice(): int
    {
        return (int)round($this->priceWithoutConsumptionTax + $this->priceWithoutConsumptionTax * $this->consumptionTax->taxRate() / 100);
    }
}