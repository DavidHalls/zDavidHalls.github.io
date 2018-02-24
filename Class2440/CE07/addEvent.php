<!DOCTYPE html>
<?php
    
?>
<html>
    <head>
        <title>Add Event</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=.50">
        <script type="text/javascript" src="addEvent.js" >
               
        </script>

        <style>
            td{
                width: 75px;                    
            }
        </style>

    </head>
    <body>
        
        <form action="Entry.php" name="myForm" method="post">
            <center><table border="1">    
                    <center><div>Adding an Event</div></center>
                    <tbody>                
                        <tr>
                            <td><label>Date</label></td>                            
                            <td><input type="text" name="mymonth" style="width:98%" placeholder="month" size="2" maxlength="2" >
                            <input type="text" name="myday" style="width:98%" placeholder="day" size="2" maxlength="2">
                            <input type="text" name="myyear" style="width:98%" placeholder="year" size="4" maxlength="4"></td>
                        </tr>
                        <tr>
                            <td><label>Event</label></td>
                            <td><input type="text" name="Event" style="width:98%" /></td>
                        </tr>
                        <tr>
                            <td><label>Repeating event?</label></td>
                            <td>Yes&nbsp;<input type="radio" name="repeat" value="yes" />&nbsp;No&nbsp;<input type="radio" name="repeat" checked="checked" value="no"</td>
                        </tr>
                        <tr>
                            <td><label>Comments</label></td>
                            <td><textarea name="Comments" rows="4" cols="25"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <button type="submit" value="Create" name="requestType" onclick="return(create());">Submit</button>

        </form>
    </body>
</html>