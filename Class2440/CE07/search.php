<?php


    $today = getdate();
    $monthInfo = $_GET['month'];
    $dayInfo = $_GET['day'];
    $yearInfo = $_GET['year'];
    $event = $_GET['dayEvent'];
    $comment = $_GET['comments'];
    $day = $day;
    $month = $month;
    $year = $year;
//    if($yearInfo == "year"){
//        $year = $year;
//    }


$select = "select * from Events where month like '".$month."' order by day";
//echo $select;
//echo $month;
$result = mysql_query($select);
//while ($row = mysql_fetch_array($result)) {
//    echo "<tr><td><br> " . $row['dayEvent'] . " "
//            . " ". $row['Date'] . "</td>"; 
//}


?>