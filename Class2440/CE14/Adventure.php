<html>
    <style>
        body{
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
</html><?php
require_once 'dblogin.php';
//    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
//        if (!$db_server)
//            die("Unable to connect to server." . mysql_error());
$conndb = mysql_connect($db_hostname, $db_username, $db_password);
if (!$conndb) {
    die('Unable to connect to database [' . mysql_error() . ']');
}
$db_selected = mysql_select_db('Adventure', $conndb);
if (!$db_selected) {
    die('Can\'t use database : ' . mysql_error());
}


    $AdvID = $_GET['AdvID'];
    if ($AdvID > 0) {
        $search = "select * from AdventureTable where idAdventureTable = $AdvID";
        
        $message = "Whole query " . $search;
        //echo $message;
        $return = mysql_query($search);
        if (!$return) {
            $message = "Whole query " . $search;
            echo $message;
            die('Invalid query: ' . mysql_error());
        }
        while ($row = mysql_fetch_array($return)) {
            $image = $row['image'];
            echo "<table>";
            echo "<tr><th>The Pool</th></tr>";
            echo "<tr><td><div id=\"advText\">" . $row['AdventureText'] . "</div></td><tr>";
            echo "<td><div id=\"button1\"><button type=\"button\" value='" . $row['Button1Value'] . "' onclick=\"letsAdventure(this.value)\">" . $row['Button1Text'] . "</button></div></td></tr>";
            echo "<tr><td><div id=\"button2\"></div><button type=\"button\" value='" . $row['Button2Value'] . "' onclick=\"letsAdventure(this.value)\">" . $row['Button2Text'] . "</button></td></tr>";
            echo "</table><img src = ".$image."/><br><br><br>";
            //echo '<img src="includes/getImage.php?id=' . "pool.jpg" . '" class="newsImage">';
        }        
}

mysql_close($conndb);

