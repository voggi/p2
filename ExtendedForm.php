<?php

namespace DWA;

use DWA\Form;

class ExtendedForm extends Form
{
    /**
     * Returns boolean if given value contains only numbers
     */
    protected function numeric($value)
    {
        # Check if value (sans decimals) is numeric
        $numeric = ctype_digit(str_replace([' ', '.'], '', $value));

        # A valid number should have either 0 or 1 decimals
        $oneOrNoneDecimal = in_array(substr_count($value, '.'), [0, 1]);

        return $numeric and $oneOrNoneDecimal;
    }
}
