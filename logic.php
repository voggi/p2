<?php

require('Form.php');
require('BillSplitter.php');
require('ExtendedForm.php');

use DWA\BillSplitter;
use DWA\ExtendedForm;

$form = new ExtendedForm($_GET);

$billSplitter = new BillSplitter();

if ($form->isSubmitted()) {
    $errors = $form->validate([
        'amount' => 'required|numeric|min:0',
        'number-of-people' => 'required|numeric|min:0',
    ]);
}

if (!$form->hasErrors) {
    $billSplitter->setAmount($form->get('amount'));

    $billSplitter->setNumberOfPeople($form->get('number-of-people'));

    $billSplitter->setTip($form->get('tip', 0));

    $billSplitter->setRoundUp($form->has('round-up'));
}

// If the form has errors, then $result is an empty string.
$result = $billSplitter->getAmountOwedString();
