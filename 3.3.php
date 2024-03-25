<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
</head>
<body>
    <?php $info = [[ 'name' => 'Ram Bahadur', 'address' => 'Lalitpur','email' => 'info@ram.com', 'phone' => 
98454545,'website' =>  'www.ram.com']]; 
?>
    <table border="1">
        <h1>INFO</h1>
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Webiste</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach( $info as $key => $person ){
                $counter = $key + 1;
                echo "
                    <tr>
                        <td>{$counter}</td>
                        <td>{$person["name"]}</td>
                        <td>{$person['address']}</td>
                        <td>{$person['email']}</td>
                        <td>{$person['phone']}</td>
                        <td>{$person['website']}</td>
                    </tr>
                ";
            }
            ?>

        </tbody>
</body>
</html>