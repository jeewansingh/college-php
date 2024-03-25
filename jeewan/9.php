<?php
$a = range(11, 20);
shuffle($a);
echo 'Output:';
for ($x = 0; $x < 10; $x++) {
    echo $a[$x] . ' ';
}
echo "\n";
?>