<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a Movie</title>
        <?php
        echo "adding<br>";
        require_once 'dblogin_1.php';
        $db_server = mysql_connect($db_hostname, $db_username, $db_password);
        if (!$db_server)
            die("Unable to connect to server." . mysql_error());
        $select = "SELECT * FROM Movies.Director order by LastName, FirstName";
        if (isset($_POST['addMovie'])) {
            $title = $_POST['Title'];
            $date = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
            $director = $_POST['Director'];
            $actor = $_POST['Actor'];
            $genre = $_POST['genre'];
            $rating = $_POST['rating'];

            //INSERT INTO `Library`.`Movies` (`Title`, `Director`, `Lead`, `Genre`, `Release`, `rating`) VALUES ('Jaws', '1', '5', 'action', '1975-06-01', '5')
            $insert = "INSERT INTO `Movies`.`Title` (`Title`, `DirectorId`, `idActors`, `GenreId`, `DateReleased`,`Rating`) "
                    . "VALUES ('$title', '$director', '$actor', '$genre', '$date','$rating')";
            //echo mysql_query($insert);
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
        <link rel="stylesheet" type="text/css" href="view.css" media="all">
        <script type="text/javascript" src="view.js"></script>
    </head>
    <body>
        <div id="form_container"><p>
            <form action="AddMovieForm.php" method="post">
                <label>Movie Name:&nbsp;&nbsp;</label><input name="Title" type="text" id="textfield"><br>
                <label>Director:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="Director" style="width:200px">
                    <?php
                    $return = mysql_query($select);
                    if (!$return) {//here we check to see if we got a result set
                        $message = "Whole query " . $select;
                        echo $message;
                        die('Invalid query: ' . mysql_error());
                    }
                    while ($row = mysql_fetch_array($return)) {//here we are loading the results into the variable row one at a time and printing out the row
                        $fname = $row['FirstName']; //you will not we have to use the collum names in the database
                        $lname = $row['LastName'];
                        $theID = $row['DirectorId'];
                        echo "<option value = $theID>$lname, $fname </option>";
                    }
                    ?>
                </select><a target="_blank" href="AddDirectorForm.php">  I do not see my director listed</a><br>
                <label>Actor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="Actor" style="width:200px">
                    <?php
                    $select1 = "SELECT * FROM Movies.Actors order by LastName, FirstName";
                    $return = mysql_query($select1);
                    if (!$return) {//here we check to see if we got a result set
                        $message = "Whole query " . $select1;
                        echo $message;
                        die('Invalid query: ' . mysql_error());
                    }
                    while ($row = mysql_fetch_array($return)) {//here we are loading the results into the variable row one at a time and printing out the row
                        $fname1 = $row['FirstName']; //you will not we have to use the collum names in the database
                        $lname1 = $row['LastName'];
                        $theID1 = $row['idActors'];
                        echo "<option value = '$theID1'>$lname1, $fname1 </option>";
                    }
                    ?></select><a target="_blank" href="AddActorForm.php">  I do not see my actor listed</a><br>
                <label>Release Date: </label><input type="text" name="year" placeholder="yyyy" maxlength="4" size="4">-<input type="text" name="month" placeholder="mm" maxlength="2" size="2">-<input type="text" name="day" placeholder="dd" maxlength="2" size="2"><br>
                <label>Genre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="genre" style="margin-left: 5px; value:Select Genre" >
                    <?php
                    $select2 = "select * from Movies.Genre";
                    $return = mysql_query($select2);
                    if (!$return) {//here we check to see if we got a result set
                        $message = "Whole query " . $select2;
                        echo $message;
                        die('Invalid query: ' . mysql_error());
                    }
                    while ($row = mysql_fetch_array($return)) {//here we are loading the results into the variable row one at a time and printing out the row
                        $fname1 = $row['GenreId']; //you will not we have to use the collum names in the database
                        $lname1 = $row['Genre'];
                        $theID1 = $row['idActors'];
                        echo "<option value = '$fname1'>$lname1</option>";
                    }
                    ?>                    
                </select><br>
                <label>Rating:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="rating" style="margin-left: 5px;">                    
                    <option value ="G">G</option>
                    <option value ="PG">PG</option>
                    <option value ="PG-13">PG-13</option>
                    <option value ="R">R</option>
                    <option value ="NC-17">NC-17</option>
                    <option value ="UnRated">UnRated</option>  
                </select>
                <br><br>
                <input type="submit" name="addMovie" value="Add Movie">
            </form>
            <p>
                <a href="MovieView.php" target="_blank">View Movie List</a>
            </p>
        </div>
    </body>
</html>
