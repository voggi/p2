<?php

namespace DWA;

class BillSplitter
{
    private $amount;

    private $numberOfPeople;

    private $tip;

    private $roundUp;

    public function __construct()
    {
        $this->amount = null;

        $this->numberOfPeople = null;

        $this->tip = null;

        $this->roundUp = null;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setNumberOfPeople($numberOfPeople)
    {
        $this->numberOfPeople = $numberOfPeople;
    }

    public function getNumberOfPeople()
    {
        return $this->numberOfPeople;
    }

    public function setTip($tip)
    {
        $this->tip = $tip;
    }

    public function getTip()
    {
        return $this->tip;
    }

    public function setRoundUp($roundUp)
    {
        $this->roundUp = $roundUp;
    }

    public function getRoundUp()
    {
        return $this->roundUp;
    }

    public function hasData()
    {
        return isset($this->amount) &&
               isset($this->numberOfPeople) &&
               isset($this->tip) &&
               isset($this->roundUp);
    }

    public function getAmountOwed()
    {
        if ($this->hasData()) {
            $exactAmount = ($this->amount * (1 + $this->tip)) / $this->numberOfPeople;
        
            if ($this->roundUp) {
                return ((int) $exactAmount) + 1;
            } else {
                return round($exactAmount, 2);
            }
        } else {
            return null;
        }
    }

    public function getAmountOwedString()
    {
        if ($amountOwed = $this->getAmountOwed()) {
            if ($this->numberOfPeople == 1) {
                return 'You owe ' . $amountOwed . ' EUR';
            } else {
                return 'Everyone owes ' . $amountOwed . ' EUR';
            }
        } else {
            return '';
        }
    }
}
