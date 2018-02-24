<?php
session_start();
require_once 'dblogin2.php';

    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server){
        die("Unable to connect to server." . mysql_error());
    }else{
        echo "Connected!";
        
    }  
  
  //unset('badpass');
  $myusername = $_POST['myusername'];
  $mypassword = $_POST['mypassword'];
  echo $myusername;  
  
  $myusername = mysql_real_escape_string($myusername);
  $myusername = stripslashes($myusername);
  $mypassword = mysql_real_escape_string($mypassword);
  $mypassword = stripslashes($mypassword);
  $hashed = hash("ripemd128", $mypassword);
  
  $select = "select * from Family.Contacts where Username = '".$myusername."' and Password"
          . " = '".$hashed."'";
  $result = mysql_query($select);
//  echo $select;
//  echo $result;
  if(!$result){
      $message = "Whole query " . $result;
      die('Invalid query' . mysql_error());
  }
  
  $count = mysql_num_rows($result);
  
  if($count == 1){
      $_SESSION['user'] = $myusername;      
      $_SESSION['password'] = $mypassword;      
      header("Location:catalogue2.php");
  }else{
      //echo "Username and/or password do not match  ";      
      header("Location:LoginPage.php");      
      $_SESSION['badpass'] = 1;
  }
  
  
  
  
/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
