<?php
 $x = array(1,2,3,4,5);
 echo'First:';
 var_dump($x);
 unset($x[3]);
 echo'<br />After Delete:';
 sort($x);
 var_dump($x);
?>