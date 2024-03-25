<?php
// Integer
$integerVar = 123;
echo "1. Integer: ";
var_dump($integerVar);

// Float (double)
$floatVar = 123.45;
echo "<br>2. Float:";
var_dump($floatVar);

// String
$stringVar = "Hello, PHP!";
echo "<br>3. String:";
var_dump($stringVar);

// Boolean
$boolVar = true;
echo "<br>4. Boolean: ";
var_dump($boolVar);

// Array
$arrayVar = array("apple", "banana", "cherry");
echo "<br>5. Array: ";
print_r($arrayVar);

// Null
$nullVar = null;
echo "<br>6. Null: ";
var_dump($nullVar);

// Object
class SampleClass {
    public $property1 = "Value 1";
    public $property2 = "Value 2";
}

$objectVar = new SampleClass();
echo "<br>7. Object: ";
var_dump($objectVar);

// Resource
$fp = fopen("3.1.php",'r');
echo "<br>8. Resource: ";
print_r($fp);
?>
