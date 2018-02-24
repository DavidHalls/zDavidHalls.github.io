<?php

require_once 'dblogin.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Unable to connect to server." . mysql_error());
mysql_select_db($db_database)
        or die("Unable to select database: " . mysql_error());


require_once 'dblogin.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Unable to connect to server." . mysql_error());
mysql_select_db($db_database)
        or die("Unable to select database: " . mysql_error());

if (isset($_POST['requestType'])) {
    $action = $_POST['requestType'];
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $birthday = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
    $username = $_POST['myusername'];
    $password = $_POST['mypword'];
    $sex = $_POST['sex'];
    $relation = $_POST['relation'];
    $hashed = hash("ripemd128", $password);

    $select = "select * from Contacts";
    $result = mysql_query($select);

    while ($row = mysql_fetch_array($result)) {
        if ($fname == $row['FirstName'] && $lname == $row['LastName']) {
            if ($username != $row['Username']) {
                $error = "Username: '" . $username . "' does not match for " . $fname ." " . $lname;
                echo "<br><br><img src='error.jpg' width='225' height='225' alt='error'/><br>";
                die($error . mysql_error());
            }
            if ($hashed != $row['Password']) {
                //echo $password;
                $error = "Incorrect password for user " . $fname . " " . $lname;
                echo "<br><br><img src='error.jpg' width='225' height='225' alt='error'/><br>";
                die($error . mysql_error());
            }
        }
    }
    echo ". . . Updating . . .<br>"
    . ". . . . . . . . . . . <br>";

    $select = "Select * from Family.Contacts where FirstName = '" . $fname . "' and LastName = '" . $lname . "'";
    $result = mysql_query($select);
    if ($result == FALSE) {
        $failmess = "Whole query " . $select . "<br>";
        echo $failmess;
        die('Invalid query: ' . mysql_error());
    } else if (!$fname || !$lname) {
        die("<br><br>First Name and Last Name are required to make an update.<br><br>  Please go back and enter the required informaion.");
    } else {
        $message = ". . . update complete . . .";
        echo $message . "<br><br><br>";

        while ($row = mysql_fetch_array($result)) {
            include 'clean.php';
            $pk = $row['idContacts'];
            if (!$address) {
                $address = $row['Address'];
                $address = clean($address);
            }
            if (!$phone) {
                $phone = $row['Phone'];
                $phone = clean($phone);
            }
            if (!$city) {
                $city = $row['City'];
                $city = clean($city);
            }
            if (!$state) {
                $state = $row['State'];
                $state = clean($state);
                //echo $state."<br>";
            }
            if (!$zip) {
                $zip = $row['Zip'];
                $zip = clean($zip);
            }
        }
    }

    $select = "Update Family.Contacts Set State = '" . $state . "', Phone = '" . $phone . "', "
            . "City = '" . $city . "', Zip = '" . $zip . "', Address = '" . $address . "' where idContacts = '" . $pk . "'";

    $result = mysql_query($select);
    echo "The record for " . $fname . " " . $lname . " has been modified.<br><br>";
    mysql_close();
}
?>