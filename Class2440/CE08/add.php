<?php
session_start();

require_once 'dblogin2.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Unable to connect to server." . mysql_error());

$select = "select Username from Family.Contacts where Username = '" . $_SESSION['user'] . "'";
$result = mysql_query($select);
while ($row = mysql_fetch_array($result)) {
    $user = $row['Username'];
}
$action = $_POST['requestType'];
//$count = 0;


?>
<html>
    <head>
        <title>Update Password </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="view.css" rel="stylesheet" type="text/css"/> 
    <nav>
        <div>
            <a href="../CE02/" class='myButton'><b>Assignment 1</b></a>
            <a href="../CE05/ContactList.php" class='myButton'><b>Assignment 2</b></a>
            <a href="../CE04/" class='myButton'><b>Assignment 3</b></a>
            <a href="#" class='myButton'><b>E-Commerce</b></a>
            <a href="../CE14/Adventure.html" class='myButton'><b>Adventure Story</b></a>


        </div>
        <p style='align:left; vertical-align: bottom'>
            <?php
            if (!isset($_SESSION['user'])) {
                $here = "<a href='../CE08/LoginPage.php' ><b>HERE</b></a>";
                echo "You are not logged in. <br> Click $here to Log in. ";
            } else {
            $select = "select * from Family.Contacts where Username = '" . $_SESSION['user'] . "'";
            $result = mysql_query($select);
            while ($row = mysql_fetch_array($result)) {
                echo "Updating password for: <br>" . $row['FirstName'] . " " . $row['LastName'];
            }
            }
            ?>
        </p>
    </nav>
    <div style='margin-left:250px'>
        <form name="form1" method="post" action="add.php">
            <?php
            //if ($count = 0) {
                print <<<HTML

            <table border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                    <td colspan="3"><strong>Member Login </strong></td>
                </tr>
                <tr>
                    <td width="125" align="left">UserName</td>
                    <td width="6">:</td>
                    <td ><input name="myusername" type="text" id="myusername" readonly value=" $user"></td>
                </tr>
                <tr>
                    <td align="left">New Password</td>
                    <td>:</td>
                    <td><input name="mypassword" type="password" id="mypassword">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>                    
                    <td><input type="submit" name="requestType" value="Update"></td>
                </tr>
                <tr>
                    <td>

                    </td>
                </tr>
                        </form>
            </table>
                
HTML;
            //}    
            
            switch ($action) {
                case "Update":
                    $mypassword = $_POST['mypassword'];
                    $hashed = hash("ripemd128", $mypword);
                    $hashed = hash("ripemd128", $mypassword);
                    $select = "Update Family.Contacts Set Password = '" . $hashed . "' where Username = '" . $_SESSION['user'] . "'";
                    $result = mysql_query($select);
                    $count++;
                    if (!$result) {
                        echo "No worky";
                    } else
                        echo "The password for " . $_SESSION['user'] . " has been modified.<br><br>";
                    $here = "<a href='../CE08/catalogue2.php' ><b>HERE</b></a>";
                    echo "Click $here to continue shopping";
                    $count = 0;
                    //mysql_close();
                    break;
            }
            ?>
    </div>




