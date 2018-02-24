<html>
    <?php
    require_once 'dblogin_1.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server)
        die("Unable to connect to server." . mysql_error());
    $select = "Select * from Director group by LastName, FirstName";
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Movies!!!!!</title>
        <link rel="stylesheet" type="text/css" href="view.css" media="all">
        <script type="text/javascript" src="view.js"></script>
    </head>
    <body>
        <div class="form">
            <div id="form_container">
                <form action="MovieView.php" method="post">

                    Sort By:
                    <ul>
                        <li>Director:<select name="Director" id="selector"><?php
                                $select = "Select * from Family.Contacts group by LastName, FirstName";
                                $return = mysql_query($select);
                                if (!$return) {//here we check to see if we got a result set
                                    $message = "Whole query " . $select;
                                    echo $message;
                                    die(' Invalid query: ' . mysql_error());
                                }
                                while ($row = mysql_fetch_array($return)) {//here we are loading the results into the variable row one at a time and printing out the row
                                    $fname = $row['FirstName']; //you will not we have to use the collum names in the database
                                    $lname = $row['LastName'];
                                    $theID = $row['DirectorId'];
                                    echo "<option value = '$theID'>$lname $fname </option>";
                                }
                                ?></select></li>
                        <li>Actor: <select name="Actor" id="selector"><?php
                                $select = "Select * from Movies.Actors group by LastName, FirstName";
                                $return = mysql_query($select);
                                if (!$return) {//here we check to see if we got a result set
                                    $message = "Whole query " . $select;
                                    echo $message;
                                    die(' Invalid query: ' . mysql_error());
                                }
                                while ($row = mysql_fetch_array($return)) {//here we are loading the results into the variable row one at a time and printing out the row
                                    $fname = $row['FirstName']; //you will not we have to use the collum names in the database
                                    $lname = $row['LastName'];
                                    $theID = $row['idActors'];
                                    echo "<option value = '$theID'>$lname $fname </option>";
                                }
                                ?> </select></li>
                        <li><input type="submit" value ="Director" name="sort" id="Button_Input"></li>
                        <li><input type="submit" value ="Lead" name ="sort" id="Button_Input"></li>
                        <li> <input type="submit" value ="Title" name="sort" id="Button_Input"> </li>
                        <li><input type="submit" value ="Year" name="sort" id="Button_Input"> </li></ul>
                </form>
                <?php
                $sortMethod = $_POST['sort'];
                $director = $_POST['Director'];
                $actor = $_POST['Actor'];
                //echo $actor;
                //echo $sortMethod;
                $select = "";
                switch ($sortMethod) {
                    case "Director":
                        $select = "Select Title.Title, Director.FirstName as dfname, "
                                . "Director.LastName as dlname, Actors.FirstName as afname, "
                                . "Actors.LastName as alname,Title.DateReleased as date, Genre.Genre as type, "
                                . "Title.Rating as rating "
                                . "from Movies.Title, Movies.Director, Movies.Actors, Movies.Genre "
                                . "where Title.DirectorId = Director.DirectorId and Title.idActors = Actors.idActors "
                                . "and Title.GenreId = Genre.GenreId "
                                . "and Director.DirectorId = $director "
                                . "order by dlname";

                        break;
                    case "Lead":
                        $select = "Select Title.Title, Director.FirstName as dfname, "
                                . "Director.LastName as dlname, Actors.FirstName as afname, "
                                . "Actors.LastName as alname,Title.DateReleased as date, Genre.Genre as type, "
                                . "Title.Rating as rating "
                                . "from Movies.Title, Movies.Director, Movies.Actors, Movies.Genre "
                                . "where Title.DirectorId = Director.DirectorId and Title.idActors = Actors.idActors "
                                . "and Title.GenreId = Genre.GenreId "
                                . "and Actors.idActors = $actor "
                                . "order by alname";

                        break;
                    case "Title":
                        $select = "Select Title.Title, Director.FirstName as dfname, "
                                . "Director.LastName as dlname, Actors.FirstName as afname, "
                                . "Actors.LastName as alname,Title.DateReleased as date, Genre.Genre as type, "
                                . "Title.Rating as rating "
                                . "from Movies.Title, Movies.Director, Movies.Actors, Movies.Genre "
                                . "where Title.DirectorId = Director.DirectorId and Title.idActors = Actors.idActors "
                                . "and Title.GenreId = Genre.GenreId "
                                . "order by Title";


                        break;
                    case "Year":

                        $select = "Select Title.Title, Director.FirstName as dfname, "
                                . "Director.LastName as dlname, Actors.FirstName as afname, "
                                . "Actors.LastName as alname,Title.DateReleased as date, Genre.Genre as type, "
                                . "Title.Rating as rating "
                                . "from Movies.Title, Movies.Director, Movies.Actors, Movies.Genre "
                                . "where Title.DirectorId = Director.DirectorId and Title.idActors = Actors.idActors "
                                . "and Title.GenreId = Genre.GenreId "
                                . "order by date";
                        break;

                    default:
                        $select = "Select * from Movies.Title";
                        break;
                }
                //echo $select;
                ?>
            </div>
        </div>
        <div class="datagrid">
            <?php
            $result = mysql_query($select);
            if (!$result) {
                $message = "Whole query " . $select;
                echo $message;
                die('Invalid query: ' . mysql_error());
            }
            echo "<div><table><tr><th>Firstname</th><th>Lastname</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Phone</th></tr> </div>";
            while ($row = mysql_fetch_array($result)) {
                echo "<tr><td> " . $row['fname'] . "</td>";
                echo "<td> " . $row['lname'] . " " . $row['dlname'] . "</td>";
                echo "<td> " . $row['address'] . " " . $row['alname'] . "</td>";
                echo "<td> " . $row['city'] . "</td>";
                echo "<td> " . $row['state'] . "</td>";
                echo "<td> " . $row['zip'] . "</td>";
                echo "<td> " . $row['phone'] . "</td></tr>";
            }
            echo "</table>";
            ?>
        </div>    </body>
</html>
