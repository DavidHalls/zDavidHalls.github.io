<?php
session_start();

if(!isset($_SESSION["randNum"])){
    
    $_SESSION["randNum"] = rand(1,100);
    $_SESSION["numGuesses"] = 0;
    $_SESSION["low"] = 1;
    $_SESSION["high"] = 100;
}
$randNum = $_SESSION["randNum"];
$userGuess = $_POST["userGuess"];
$count = $_SESSION["numGuesses"];
$message = "";
if(isset($_POST['userGuess'])){
    $_SESSION["numGuesses"]++;
    if($userGuess > $randNum){
        $message = "<center>You guessed too high!</center> You are on guess $count";  
        $_SESSION["high"] = $userGuess;
    }else if($userGuess < $randNum){
        $message = "<center>You guessed too low!</center> You are on guess $count";  
        $_SESSION["low"] = $userGuess;
    }else if($userGuess == $randNum){
        $message = "<center> You are correct!</center> You got the correct answer in $count guesses";
        unset($_SESSION["randNum"]);
        unset($_SESSION["numGuesses"]);
        //session_reset();
        session_destroy();                
    }
}else {
    $message = "<center> Are you ready to start?</center>You are on $count guess!";
}
echo <<<HTML
<html>
    <head>
        <title>Guessing Game</title>
    </head>
    <body>
    <center>
        <form action="guessingGame.php" method="POST">
            Guess a number 1 - 100:<select name="userGuess">
HTML;

for($i = $_SESSION["low"]; $i <= $_SESSION["high"]; $i++){
    echo "<option value='$i'>$i</option>";    
}
echo <<<HTML
            </select>
            <input type="submit" value="Guess"/>
        </form></center>
HTML;

echo $message;
echo "</body></html>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
