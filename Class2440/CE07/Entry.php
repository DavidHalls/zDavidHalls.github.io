
<?php

require_once 'dblogin.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Unable to connect to server." . mysql_error());
mysql_select_db($db_database)
        or die("Unable to select database: " . mysql_error());
//$select = "SELECT * FROM Family.Contacts order by LastName, FirstName";

if (isset($_POST['Event'])) {
    $event = $_POST['Event'];
    $comments = $_POST['Comments'];
    $day = $_POST['myday'];
    $month = $_POST['mymonth'];
    $year = $_POST['myyear'];
    $date = $year . "-" . $month . "-" . $day;
    $repeat = $_POST['repeat'];
    if ($event == "") {
        $message = "No Event has been entered";
        echo $message;
        die($error . mysql_error());        
    } 
}
$event = mysql_real_escape_string($event);
$comments = mysql_real_escape_string($comments);
$day = mysql_real_escape_string($day);
$month = mysql_real_escape_string($month);
$year = mysql_real_escape_string($year);
//$event = stripslashes($event);

$select = "select * from Events";
$result = mysql_query($select);
while ($row = mysql_fetch_array($result)) {
    if ($event == $row['dayEvent'] && $month == $row['month'] && $day == $row['day']) {
        $error = "Event: " . $event . " already exists.  Please enter a new one. ";
        die($error . mysql_error());
    }
}
//INSERT INTO `Calendar`.`Events` (`dayEvent`, `year`, `month`, `day`) VALUES ('Valentine\'s Day', 'year', '2', '14');

$insert = "INSERT INTO `Calendar`.`Events` (`dayEvent`, "
        . "`comments`, `year`, `month`, `day`, `repeat`) VALUES ('$event', '$comments', '$year', '$month', '$day', '$repeat')";

$result = mysql_query($insert);
if ($result == FALSE) {
    $failmess = "Whole query " . $result . "<br>";
    echo $failmess;
    die('Invalid query: ' . mysql_error());
} else {
    $message = "insert complete <br>";
    echo $message;
}
//}
$select = "select * from Calendar.Events where dayEvent = '" . $event . "' and comments = '" . $comments . "'";
$result = mysql_query($select);

while ($row = mysql_fetch_array($result)) {//here we are loading the results into the variable row one at a time and printing out the row
    $event = $row['dayEvent'] . "<br>"; //you will not we have to use the collum names in the database
    $comments = $row['comments'] . "<br>";
    echo "<tr><td> <br>Event has been created for: <br> Event: " . $row['dayEvent'] . "</td>";
    echo "<td> <br>Comments: " . $row['comments'] . " " . "</td><br><br> You need to refresh the page to see updated results";
    echo "</table>";
}


mysql_close();
?>