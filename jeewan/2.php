<?php
$color=array('white','green','red');
echo "a)";
foreach($color as $c){
    echo $c.",";
}
echo "<br />";
echo "b)<ul>";
sort($color);
foreach($color as $c){
    echo"<li>".$c."</li>";
}
echo "</ul>";
?>