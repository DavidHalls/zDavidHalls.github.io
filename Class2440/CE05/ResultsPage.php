<html>
    <?php
    require_once 'dblogin.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server)
        die("Unable to connect to server." . mysql_error());
    $select = "Select * from Contacts group by LastName, FirstName";
    mysql_select_db($db_database);
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Contacts </title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" media="all">
        <script type="text/javascript" src="view.js"></script>
    </head>
    <body>
        <div class="banner"><h1>Friends and Family Contact Directory</h1></div>        
        <div class="datagrid">       

            <?php                 
            $action = $_POST['requestType'];            
            switch ($action) {
                case "Create":
                    include 'create.php';
                    break;
                case "Update":
                    include 'update.php';
                    break;
                case "Search":
                    include 'search.php';
                    break;
            }
            mysql_close();
            ?>

            <br><br><br><br>
            <form action="ContactList.php">
                <input class="myButton" type="submit" value="Return" />
            </form>

        </div>    </body>
</html>
