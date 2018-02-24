<?php

    function clean($var) {
        $var = mysql_real_escape_string($var);
        $var = stripslashes($var);
        $var = htmlentities($var);
        $var = strip_tags($var);    
        $var = trim($var);

    return $var;
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

