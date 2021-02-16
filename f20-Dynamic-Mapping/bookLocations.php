<?php
    include ("Admin/connect.php");

    $query = "SELECT * FROM booklocations_f20 ORDER BY ShelfNo ASC";
    $result = mysqli_query($conn, $query)or die(mysqli_error());

    $list = array();
    $i = 0;
    
    while($row = mysqli_fetch_array($result)){
        $list[] = array(
            'ShelfNo' => $row['ShelfNo'],
            'First' => $row['First'],
            'Last' => $row['Last'],
            'Map' => $row['Map']
        );

        if($i == 0) //the script was not passing the first row to the string so this if statement will place the first row in its own variable to ensure it is passed
            $firstRow = $list[0]['ShelfNo'] . "," . $list[0]['First'] . "," . $list[0]['Last'] . "," . $list[0]['Map'] . "\n";

        $string = $list[$i]['ShelfNo'] . "," . $list[$i]['First'] . "," . $list[$i]['Last'] . "," . $list[$i]['Map'] . "\n";
        $fullstring = $fullstring . $string;
        $i++;
    }
    echo $firstRow . $fullstring;
?>