<?php
$brand = array('A' => 'Apple', 'B' => 'Bird', 'c' => 'Carbon');
print_r($brand);
echo '<br />UpperCase:<br />';
foreach ($brand as $key => $value) {
    $brand[$key] = strtoupper($value);
}
print_r($brand);
echo '<br />LowerCase:<br />';
foreach ($brand as $key => $value) {
    $brand[$key] = strtolower($value);
}
print_r($brand);
?>