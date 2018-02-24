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
        <?php
            $select = "select * from Movies.Title";
            $query = mysql_query($select);
            echo $query;
        ?>
    </body>