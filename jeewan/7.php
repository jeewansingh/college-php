<?php
 $temp = [50,60,70,90,42,62,52,87,32,45,75,25,60,61,66,65,57,65,32,45,75,45,45,55,56,57,58,59,60,61,62,63,64];
 $average=array_sum($temp)/count($temp);
 echo "Recorded Weight: temp =".implode(", ", $temp).'<br />';
 echo 'Average='. $average;
 sort($temp);
 $lowest= array_splice($temp,0,5);
 echo "<br />The lowest 5 numbers are: " . implode(", ", $lowest) .'<br />';
 rsort($temp);
 $highest= array_splice($temp,0,5);
 echo "The highest 5 numbers are: " . implode(", ", $highest);
?>