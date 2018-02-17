<?php

require('BillSplitter.php');
require('Validator.php');

use Voggi\Validator;
use Voggi\BillSplitter;

if ($validated = Validator::validate($_GET)) {
    $billSplitter = new BillSplitter();

    $billSplitter->setAmount($validated['amount']);

    $billSplitter->setNumberOfPeople($validated['number-of-people']);

    $billSplitter->setTip($validated['tip']);

    $billSplitter->setRoundUp($validated['round-up']);

    $result = $billSplitter->getAmountOwedString();
}
