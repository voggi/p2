<?php

namespace P2;

class BillSplitter
{
    public $amount;

    public $numberOfPeople;

    public $tip;

    public $roundUp;

    public function construct($amount, $numberOfPeople, $tip, $roundUp = false)
    {
        $this->amount = $amount;

        $this->numberOfPeople = $numberOfPeople;

        $this->tip = $tip;

        $this->roundUp = $roundUp;
    }

    public function getAmountOwed()
    {
        $exactAmount = ($this->amount * (1 + $this->tip)) / $this->numberOfPeople;
        
        if ($this->roundUp) {
            return ((int) $exactAmount) + 1;
        } else {
            return round($exactAmount, 2);
        }
    }

    public function getAmountOwedString()
    {
        $amountOwed = $this->getAmountOwed();

        if ($this->numberOfPeople == 1) {
            return 'You owe ' . $amountOwed . ' EUR';
        } else {
            return 'Everyone owes ' . $amountOwed . 'EUR';
        }
    }
}