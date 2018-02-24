<?php
    require_once 'dblogin.php';
            $db_server = mysql_connect($db_hostname, $db_username, $db_password);
            if (!$db_server)
                die("Unable to connect to server." . mysql_error());
            mysql_select_db($db_database)
                    or die("Unable to select database: " . mysql_error());
            $select = "SELECT * FROM Family.Contacts order by LastName, FirstName";
            
            if (isset($_POST['requestType'])) {
                $action = $_POST['requestType'];
                $fname = $_POST['fName'];
                $lname = $_POST['lName'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip = $_POST['Zip'];
                $birthday = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
                $username = $_POST['myusername'];
                $password = $_POST['mypword'];
                $sex = $_POST['sex'];
                $relation = $_POST['relation'];        
             
            }
            include 'clean.php';
            $fname = clean($fname);
            $lname = clean($lname);
            $phone = clean($phone);
            $address = clean($address);
            $city = clean($city);
            $zip = clean($zip);
            $username = clean($username);
            $password = clean($password);     
            
            $fname = mysql_real_escape_string($fname);
            $lname = clean($lname); 
            
            $select = "select * from Contacts";
            $result = mysql_query($select);
            while ($row = mysql_fetch_array($result)) {
                if ($username == $row['Username']) {
                    $error = "Username: '" . $username . "'already exists.  Please enter a new one. ";
                    die($error . mysql_error());
                }                
                if ($fname == $row['FirstName'] && $lname == $row['LastName']) {
                    include 'search.php';
                    $error = "<br>Contact: " . $fname . " " .$lname . " already exists.  <br><br>You can locate this contact using \"Search!\"<br><br>"  ;                    
                    die($error);//include 'ResultsPage.php';
                }
            }
    
            $password = hash("ripemd128", $password);
                $insert = "INSERT INTO `Family`.`Contacts` (`FirstName`, `LastName`, `Phone`, 
                    `Address`, `City`, `State`, `Zip`, `BirthDate`, `Username`, 
                    `Password`, `Gender`, `Relationship`) VALUES ('$fname', '$lname', 
                            '$phone', '$address', '$city', '$state', '$zip', '$birthday', 
                            '$username', '$password', '$sex', '$relation')";
                if(!$fname || !$lname){     
                    die ("<br><br>First Name and Last Name are required.<br><br>  Please go back and enter the required informaion.");
                }
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
            $select = "select * from Contacts where FirstName = '" . $fname ."' and LastName = '" . $lname ."'";
            $result = mysql_query($select);
                while ($row = mysql_fetch_array($result)) {//here we are loading the results into the variable row one at a time and printing out the row
                $fname = $row['FirstName'] . "<br>"; //you will not we have to use the collum names in the database
                $lname = $row['LastName'] . "<br>";
                $phone = $row['Phone'] . "<br>";
                $address = $row['Address'] . "<br>";
                $city = $row['City'] . "<br>";
                $state = $row['State'] . "<br>";
                $zip = $row['Zip'] . "<br>";  
                $pk = $row['idContacts'];
                echo "<tr><td> <br>Record created for: <br> First Name: " . $row['FirstName'] . "</td>";
                echo "<td> <br>Last Name: " . $row['LastName'] . " " . "</td>";
                echo "<td> <br>Address: " . $row['Address'] . " " . "</td>";
                echo "<td> <br>City: " . $row['City'] . "</td>";
                echo "<td> <br>State: " . $row['State'] . "</td>";
                echo "<td> <br>Zip: " . $row['Zip'] . "</td>";
                echo "<td> <br>Phone: " . $row['Phone'] . "</td></tr>";   
                 
            
            echo "</table>";
            }
            
            mysql_close();
            ?>