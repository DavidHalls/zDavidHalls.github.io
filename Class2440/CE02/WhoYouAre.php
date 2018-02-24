<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!--This will change the background based on the gender that is entered-->
<?php
$back = $_POST['Gender'];
$body = "body { background-color: pink; background-image: url(\"original.jpg\"); background-repeat:no-repeat; color: red; font-size: 22px; }";
if ($back == "Male") {
    $body = "body {background-color:black; height: 500px; background-position:right; background-repeat: no-repeat; background-image: url(\"blackandwhite.jpg\"); color: red; font-size: 22px;}";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Who You Are!</title>
        
        <style>
            body{
                //background-color: blue;
                margin-left: 450px;
                margin-right: 450px;
                text-align: center;
                //background-image: url("shelf.jpg");

            }   
            #rcorners2 {
                border-radius: 25px;
                border: 2px solid #8AC007;
                padding: 20px; 
                width: 500px;
                height: auto;
                margin-left: auto;
                margin-right: auto;
                background-color: pink;    
            }
            select.element{
                margin-left: auto;
                margin-right: auto;
                width: 305px;
                display: inline-block;
            }
            input.element{
                margin-left: auto;
                margin-right: auto;
                width: 300px;
                display: inline-block;
            }
            one{
                margin-left: 15%;
                margin-right: 15%;
                text-align: center;                
            }
            <?php
            echo $body;
            ?>

        </style>  
    <body>
        <?php
//put yoir code here

        //Here we are getting the data from the Who Am I page
        // and creating variables with those values
        if ($_POST['Name'] == NULL) {
            printf("<br><div style='color:blue; text-align: center; font-size:22px !important;'>No information has been received!</div><br>");
        } else {
            $Name = $_POST['Name'];
            $Age = $_POST['Age'];           
            $Address = $_POST['Address'];
            $City = $_POST['City'];
            $State = $_POST['State'];
            $Gender = $_POST['Gender'];
            $bday = $_POST['Bday']; 
            
            //The newly defined variables are entered here into the print 
            printf("<br><div style='color:blue; text-align:center; font-size:22px !important;'>%s<br>"
                    . "You are $Gender, you are $Age years old.<br>"
                    . "Your address is $Address<br>"
                    . "You live in $City, $State."
                    . " "
                    . "</div><br>", $Name, $Age);            
        }
        
        //This sets the year to a 4 digit date
        $year = date('Y');
        print("$year\n"); 
        //this if is to determine how many years to go back
        //ie if you are 10 now, and have NOT had your bday
        //it would say your bday is 2005, but really is 2004
        if($bday == "No"){            
            $Age++;            
        }//a while loop to repeat each year
        while ($Age != 1) {
            $Age--;
            $year--;
            print("$year\n");
        }//if statement so the final year is not duplicated 
        //because i wanted a more descriptive statement for the birth year
        if ($Age == 1) {
            $Age--;
            $year--;
            printf("<br><br>You were born in %s! <br><br>", $year);
        }
        //this will get the data from the PostPage.txt file and then print 
        //it out to the screen.
        $myFile = "PostPage.txt";
        $fh = fopen($myFile, 'r');
        $theData = fread($fh, 1500);
        fclose($fh);
        echo $theData;
        
        ?> 

    </body>
</html>
