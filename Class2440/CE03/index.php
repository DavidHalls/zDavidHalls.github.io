<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once'dblogin_1.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if(!$db_server) die("Unable to connect to server.".mysql_error());
    
    mysql_select_db($db_database)
    or die("Unable to select the database:".  mysql_error());

    $query ="Select * from CUSTOMER";
    $result = mysql_query($query);
    if(!$result)die("Database access failed:".mysql_error());
    $rows = mysql_num_rows($result);
    
    for($j = 0; $j < $rows; ++$j){
        echo 'Customer:  '.mysql_result($result, $j, 'CUSTOMER_NAME').'<br>'
            .mysql_result($result, $j,'STREET').' '
            .mysql_result($result, $j,'CITY').' '
            .mysql_result($result, $j,'STATE').' '
            .'$'.mysql_result($result, $j,'BALANCE').' '
            .'$'.mysql_result($result, $j,'CREDIT_LIMIT').'<br><br>';
    }
    
    mysql_close();
?>

