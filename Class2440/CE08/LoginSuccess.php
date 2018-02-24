<?php
    session_start();
    require_once 'dblogin2.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server)
        die("Unable to connect to server." . mysql_error());
    $select = "Select * from Director group by LastName, FirstName";
    
    echo "hello world!";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

