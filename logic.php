<?php

require('BillSplitter.php');
require('Validator.php');

$billSplitter = new Voggi\BillSplitter();

if ($validated = Voggi\Validator::validate($_GET)) {
    $billSplitter->setAmount($validated['amount']);

    $billSplitter->setNumberOfPeople($validated['number-of-people']);

    $billSplitter->setTip($validated['tip']);

    $billSplitter->setRoundUp($validated['round-up']);
}
