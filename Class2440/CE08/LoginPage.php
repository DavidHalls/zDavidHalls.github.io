<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="view.css" rel="stylesheet" type="text/css"/> 
        <title>Log in</title>
        <style>
        </style>
    </head>
    <body>
        <!--menu-
        <div class="wrapper row1">-->

        <nav>
<!--
            <div>
            <a href="WhoAmI.php" class="myButton">Assignment 1</a>                  
            <a href="FriendsandFamNoVal.php" class="myButton">Assignment 2</a>
            <a href="FriendFamilyForm.php" class="myButton">Assignment 3</a>
            <a href="LoginPage.php" class="myButton">E-Commerce Site</a>
            <a href="#" class="myButton">Classroom Exercises</a>      
            </div>
-->
        </nav>


        <!-- content -->
        
            <div style='margin-left:250px'>
                <form name="form1" method="post" action="LoginCheck.php">
                    <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                            <td colspan="3"><strong>Member Login </strong></td>
                        </tr>
                        <tr>
                            <td width="78">UserName</td>
                            <td width="6">:</td>
                            <td width="294"><input name="myusername" type="text" id="myusername"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input name="mypassword" type="password" id="mypassword">
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Login"></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../CE05/ContactList.php">Create an Account</a>
                            </td>
                        </tr>
                <!--</form>-->
                </table>
            </div>
    </body>
</html>