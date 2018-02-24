<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once'dblogin.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if(!$db_server) die("Unable to connect to server.".mysql_error());
    
    mysql_select_db($db_database)
    or die("Unable to select the database:".  mysql_error());

    $query ="Select * from Title";
        
    $result = mysql_query($query);
    if(!$result)die("Database access failed:".mysql_error());
    $rows = mysql_num_rows($result);
    
    for($j = 0; $j < $rows; ++$j){
        echo 'Title: '.mysql_result($result, $j, 'Title').' '
                .'Actor: '.mysql_result($result, $j, 'idActors').' '
                .'Director: '.mysql_result($result, $j, 'DirectorID').' '
                .'Genre: '.mysql_result($result, $j, 'GenreID').'<br><br>';              
        
    }
    
    mysql_close();
?>

