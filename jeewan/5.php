<?php
$x=[1,2,3,4,5];
$y=['$'];
echo'Original Array:';
foreach($x as $k){
    echo $k.' ' ;
}
function insertWithArraySplice($array, $insert, $position) {
    array_splice($array, $position, 0, $insert);
    return $array;
}

$a=insertWithArraySplice($x, $y, 3);
echo'<br /> After inserting $ the array is :';
echo '<br />a.Using Array_splice and other Function<br />';
foreach($a as $k){
    echo $k.' ' ;
}
function insertWithoutArraySplice($original_array, $new_item, $position) {
    $length=count($original_array);
    $result_array = [];

    for ($i = 0; $i < $length; $i++) {
        if ($i == $position) {
            $result_array[] = $new_item;
        }
        $result_array[] = $original_array[$i];
    }
    return $result_array;
}

$b = insertWithoutArraySplice($x, $y, 3);
echo '<br />b.Without Using Array_splice<br />';
foreach($b as $k){
    if (is_array($k)) {
        foreach ($k as $inner) {
            echo $inner . ' ';
        }
    } else {
        echo $k . ' ';
    }
}
?>