<?php
// Validation functions
function isPositiveInteger($value) {
    return preg_match("/^[1-9][0-9]*$/", $value);
}

function isValidName($value) {
    return preg_match("/^[A-Z][A-Za-z0-9 ]*$/", $value);
}

function isPositiveDecimalInRange($value, $min, $max) {
    return filter_var($value, FILTER_VALIDATE_FLOAT, array("options" => array("min_range" => $min, "max_range" => $max)));
}
?>
