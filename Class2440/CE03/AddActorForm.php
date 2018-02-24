
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add an Actor</title>
        <link rel="stylesheet" type="text/css" href="view.css" media="all">
        <script type="text/javascript" src="view.js"></script>
    </head>
    <body>
        <?php
        require_once 'dblogin_1.php';
        $db_server = mysql_connect($db_hostname, $db_username, $db_password);
        if (!$db_server)
            die("Unable to connect to server." . mysql_error());
        if (isset($_POST['FirstName'])) {
            $first = $_POST['FirstName'];
            $second = $_POST['LastName'];
            //echo $first . $second;
            //$bio= $_POST['bio'];
            //$link = $_POST['link'];
                     
            $insert = "INSERT INTO `Movies`.`Actors` (`FirstName`, `LastName`) VALUES ('$first', '$second')";
            
            
            //Now we load the result of the query into a variable to make sure we succeeded.
            $success = mysql_query($insert);

            if ($success == FALSE) {
                $failmess = "Whole query " . $insert . "<br>";
                echo $failmess;
                die('Invalid query: ' . mysql_error());
            } else {
                $message = "insert complete";
            }
        }
        ?>
        <div id="form_container">
            <form action="AddActorForm.php" method="post">
                <label>First Name: </label><input name="FirstName" type="text"></br>
                <label>Last Name: </label><input name="LastName" type="text"></br>
                <!--<label>Biology: </label><textarea name="bio" ></textarea></br>-->
                <!--<label>Image link: </label><input name="link" type="text"></br>-->
                <input type="submit" name="addPerson" value="Add Person">
            </form>
            <?php
            echo $message;
            mysql_close();
            ?>
        </div>
    </body>
</html>
