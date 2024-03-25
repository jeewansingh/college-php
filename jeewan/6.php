
<?php

$list = array("Ram"=>"31","Hari"=>"41","Sita"=>"39","Gita"=>"40");
echo 'Ascending Sort by Value <br />';
asort($list);
print_r($list);
echo '<br />Ascending Sort by Key <br />';
ksort($list);
print_r($list);
echo '<br />Descending Sort by Value <br />';
arsort($list);
print_r($list);
echo '<br />Descending Sort by Key <br />';
krsort($list);
print_r($list);