<?php
function validateProductID($productID) {
    return filter_var($productID, FILTER_VALIDATE_INT) && $productID > 0;
}

function validateName($name) {
    return preg_match("/^[A-Z][A-Za-z0-9 ]*$/", $name);
}

function validatePrice($price) {
    return filter_var($price, FILTER_VALIDATE_FLOAT) && $price >= 1 && $price <= 1000;
}
?>
