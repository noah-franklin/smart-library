<?php
    include ("Admin/connect.php");

    $query = "SELECT * FROM shelflocations_f20 WHERE Map = 2 ORDER BY ShelfNo ASC";
    $query2 = "SELECT * FROM permstructlocations_f20 WHERE Map = 2 ORDER BY StructID ASC";
    $result = mysqli_query($conn, $query)or die(mysqli_error());
    $result2 = mysqli_query($conn, $query2)or die(mysqli_error());

    $i = 0;
    while($row = mysqli_fetch_array($result)){
        $list[] = array(
            'X' => $row['X'],
            'Y' => $row['Y'],
            'Width' => $row['Width'],
            'Height' => $row['Height'],
            'ShelfNo' => $row['ShelfNo'],
            'Map' => $row['Map']
        );
        //if shelf belongs to concourse map and is not missing a value, echo a rectangle element representing the shelf
        if(!in_array("MISSING", $list[$i])) {
            //$string = "<svg width=&ldquo;5&rdquo; height=&ldquo;20&rdquo;><a href=tables/groundfloor/$i.html target=&ldquo;BOT&rdquo;><rect id =\"" . $list[$i]['ShelfNo'] . "\"  width=\"" . $list[$i]['Width'] . "\" height=\"" . $list[$i]['Height'] . "\" x=\"" . $list[$i]['X'] . "\" y=\"" . $list[$i]['Y'] . "\" style=\"cursor:pointer;\"/></a></svg>";            echo($string);
            $string = "<svg width=&ldquo;5&rdquo; height=&ldquo;20&rdquo;><a onclick=getBookCase('" .$list[$i]['Bookcase'] . "','a')><rect class=\"" . $list[$i]['Class'] . "\" id =\"" . $list[$i]['ShelfNo'] . "\" width=\"" . $list[$i]['Height'] . "\" height=\"" . $list[$i]['Width'] . "\" x=\"" . $list[$i]['X'] . "\" y=\"" . $list[$i]['Y'] . "\" style=\"cursor:pointer;\"/></a></svg>";
        }
        $i++;
    }

    $j = 0;
    while($row = mysqli_fetch_array($result2)){
        $list2[] = array(
            'StructID' => $row['StructID'],
            'Type' => $row['Type'],
            'X' => $row['X'],
            'Y' => $row['Y'],
            'Width' => $row['Width'],
            'Height' => $row['Height'],
            'Map' => $row['Map']
        );
        //if shelf is not missing a value, echo a rectangle element representing the shelf
        if(!in_array("MISSING", $list2[$j])) {
            if($list2[$j]['Type'] == 1)
                $string = "<rect class = \"st03\" id =\"" . $list2[$j]['StructID'] . "\" width=\"" . $list2[$j]['Width'] . "\" height=\"" . $list2[$j]['Height'] . "\" x=\"" . $list2[$j]['X'] . "\" y=\"" . $list2[$j]['Y'] . "\"\"/>";
            echo($string);
        }
        $j++;
    }

?>