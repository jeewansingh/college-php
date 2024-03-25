<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
</head>
<body>
    <?php $marks = [
        ['name'=>'Ram', 'roll'=> 1,'OS'=> 48, 'NM'=> 45, 'SL' => 78, 'DBMS' => 54, 'SE'=> 52],
        ['name'=>'Shyam', 'roll'=> 2,'OS'=> 40, 'NM'=> 45, 'SL' => 78, 'DBMS' => 14, 'SE'=> 22],
        ['name'=>'Hari', 'roll'=> 3,'OS'=> 80, 'NM'=> 45, 'SL' => 64, 'DBMS' => 54, 'SE'=> 62],
        ['name'=>'Sita', 'roll'=> 4,'OS'=> 40, 'NM'=> 25, 'SL' => 78, 'DBMS' => 54, 'SE'=> 22],
        ['name'=>'Krishna', 'roll'=> 5,'OS'=> 90, 'NM'=> 95, 'SL' => 88, 'DBMS' => 94, 'SE'=> 88]
    ];?>
    
    <table border="1">
        <h1>LEDGER</h1>
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Roll No.</th>
                <th>OS</th>
                <th>NM</th>
                <th>SL</th>
                <th>DBMS</th>
                <th>SE</th>
                <th>TOTAL</th>
                <th>RESULT</th>
                <th>PERCENTAGE</th>
                <th>DIVISION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach( $marks as $key=>$mark ){
                $counter = $key + 1;
                $total = $mark['OS'] + $mark['NM'] + $mark['SE'] + $mark['DBMS'] + $mark['SL'];
                
                $result = "Fail";
                $percentage ="-";
                $division = "-";
                $color = " style=\"background-color: black; color: white;\"";
                if ( $mark['OS'] > 40 && $mark['NM'] > 40 && $mark['SE'] > 40 && $mark['DBMS'] > 40 && $mark['SL'] > 40){
                    $result = "Pass";
                    $percentage = $total/5;
                    if ($percentage >= 80){
                        $division = "First"; 
                    } else if ($percentage >= 60) {
                        $division = "Second"; 
                    } else {
                        $division = "Third";
                    }
                    $color = "";
                }

                echo "
                    <tr{$color}>
                        <td>{$counter}</td>
                        <td>{$mark["name"]}</td>
                        <td>{$mark['roll']}</td>
                        <td>{$mark['OS']}</td>
                        <td>{$mark['NM']}</td>
                        <td>{$mark['SL']}</td>
                        <td>{$mark['DBMS']}</td>
                        <td>{$mark['SE']}</td>
                        <td>{$total}</td>
                        <td>{$result}</td>
                        <td>{$percentage}</td>
                        <td>{$division}</td>
                    </tr>
                ";
            }
            ?>

        </tbody>
</body>
</html>