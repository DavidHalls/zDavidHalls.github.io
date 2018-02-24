<?php
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
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sex = $_POST['sex'];
                $relation = $_POST['relation'];

            }
            if($action == 'Create'){
            $select = "SELECT * FROM Family.Contacts where FirstName like '%" .$fname. "%' and LastName like '%".$lname."%'";            
            }else{
            $select = "SELECT * FROM Family.Contacts where FirstName like '%" .$fname. "%' and LastName like '%" .$lname. "%' and State like '%" .$state. "%'";
            }
            //echo $select;
            $result = mysql_query($select);
            echo "<table><tr><th>Firstname&nbsp&nbsp&nbsp&nbsp</th><th>Lastname&nbsp&nbsp&nbsp&nbsp</th>"
                    . "<th>Address&nbsp&nbsp&nbsp&nbsp</th><th>City</th><th>State&nbsp&nbsp&nbsp&nbsp</th>"
                    . "<th>Zip&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>"
                    . "<th>Phone&nbsp&nbsp&nbsp&nbsp</th></tr>";
            while ($row = mysql_fetch_array($result)) {
                echo "<tr><td> " . $row['FirstName'] . "</td>";
                echo "<td> " . $row['LastName'] . "</td>";
                echo "<td> " . $row['Address'] . " " . "</td>";
                echo "<td> " . $row['City'] . "</td>";
                echo "<td> " . $row['State'] . "</td>";
                echo "<td> " . $row['Zip'] . "</td>";
                echo "<td> " . $row['Phone'] . "</td></tr>";
            }
            echo "</table>";
            mysql_close();
            ?>