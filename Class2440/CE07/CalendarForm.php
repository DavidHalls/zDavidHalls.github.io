<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script type="text/javascript" src="addEvent.js">

</script>
<style>
    div.one{
        display: inline-block;    
        position: relative;
        //vertical-align: bottom;
        color: darkgreen;
        text-align: left;
        padding: 1px;

    }
    div.two{
        display: inline-block;
        position: relative;
        float: left;
        width: 30%;
        padding: 1px;       

    }
    div.three{
        display: inline-block;    
        position: relative;
        vertical-align: bottom;
        //color: darkgreen;
        text-align: left;
        padding: 1px;
        font-size: 12px;
        size: 100%;
        //background: red;
        color: darkgreen;
    }
    table.one{
        column-width: 100%; 
    }
    table.two{
        column-width: 100%; 
        margin-left:50px;
    }
</style>
<?php
require_once 'dblogin.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Unable to connect to server." . mysql_error());
mysql_select_db($db_database)
        or die("Unable to select database: " . mysql_error());
/* Set up the variables for days, moths year
 * today = m/d/y
 * cmd = 1 (add months) or -1 (sub Months)
 */

//include 'search.php';

function setvars() {
//default is today
    date_default_timezone_set('America/Denver');
    $today = getdate();
    $month = $today['mon'];
    $year = $today['year'];
    $today = $month . "/" . $today['mday'] . "/" . $year;
    //echo print_r(getdate());
// Get POST data
    if (isset($_POST) && count($_POST) != 0) {
        if (isset($_POST['month'])) {
            $month = $_POST['month'];
        }
        if (isset($_POST['year'])) {
            $year = $_POST['year'];
        }
        if (isset($_POST['next'])) {
            $cmd = 1;
        }
        if (isset($_POST['prev'])) {
            $cmd = -1;
        }
    }

// Get GET data
    if (isset($_GET) && count($_GET) != 0) {
        if (isset($_GET['month'])) {
            $month = $_GET['month'];
        }
        if (isset($_GET['year'])) {
            $year = $_GET['year'];
        }
        if (isset($_GET['next'])) {
            $cmd = 1;
        }
        if (isset($_GET['prev'])) {
            $cmd = -1;
        }
    }

// If given a command (move month)
//  act on it
    if (isset($cmd)) {
        $month += $cmd;
// Adjust month over or underrun
        if ($month >= 13) {
            $month = 1;
            $year += 1;
        } elseif ($month <= 0) {
            $month = 12;
            $year -= 1;
        }
    }

// Return vars in an array
    return array("today" => $today,
        "month" => $month,
        "year" => $year,
        "cmd" => $cmd);
}

/* End setvars()
  Do the document header
 * this will write the head of the document in HTML
 */

function getEvents($month, $year) {
    $month = $month;
    $year = $year;
    //echo $month . "/" . $year;
    include 'search.php';
    print <<<HTML
    
    <div class="two" >     
            <br> ---  Events This Month  ---<br>
    <table border="0" width="70%" class="two">
<tbody>

HTML;
//$result = mysql_query($select);
    while ($row = mysql_fetch_array($result)) {
        if ($row['repeat'] == "yes") {
            if ($row['year'] == "year") {
                echo "<col width='100%'><tr><td align='left'> " . $row['dayEvent'] . "</td><td align='left'> "
                . "" . $row['month'] . "/" . $row['day'] . "/" . $year . "</td>";
            }else
            echo "<col width='100%'><tr><td align='left'> " . $row['dayEvent'] . "</td><td align='left'> "
            . " " . $row['month'] . "/" . $row['day'] . "/" . $row['year'] . "</td>";
        } else if ($row['year'] == $year) {
            echo "<col width='100%'><tr><td align='left'> " . $row['dayEvent'] . "</td><td align='left'> "
            . " " . $row['month'] . "/" . $row['day'] . "/" . $year . "</td>";
        }
    }

    print <<<HTML
        </tr>
        </tbody>
        </table>
        </div >
HTML;
}

function docheader($month, $year) {

// Set script to return to (form action)
    $this_script = $_SERVER['PHP_SELF'];
    $month_text = date("F", strtotime($month . "/1/" . $year));

// If content header has not been sent,
//   send it this tells the Page to set itself up as an HTML page
    if (!headers_sent()) {
        header('Content-type: text/html');
    }

// Print the document header (up to first date row)
    print <<<HTML
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1.dtd">
   
<html>
<head>
  <title>Calendar - $month_text $year</title>
  <style type="text/css">
    tr.weekdays td { width: 100px;
                     text-align: center;
                   }
    tr.week td { width: 100px;
                 height: 100px;
                 color: black;  }
  </style>
</head>

<center><body>
<form action="$this_script" name="myForm" method="post">            
            <div float="right">
<table border="1" class="one">

<!-- Controls and calendar title (month) -->
<tr>
  <td colspan="1" align="left">
    <input type="submit" name="prev" value="&lt;&lt;" />
  </td>
  <td colspan="5" align="center">
    <strong>
      $month_text $year
    </strong>
    <input type="hidden" name="month" value="$month" />
    <input type="hidden" name="year" value="$year" />
  </td>
  <td colspan="1" align="right">
    <input type="submit" name="next" value="&gt;&gt;" />
  </td>
</tr>

<!-- Day of week header row -->
<tr class="weekdays">
  <th>Sunday</th>
  <th>Monday</th>
  <th>Tuesday</th>
  <th>Wednesday</th>
  <th>Thursday</th>
  <th>Friday</th>
  <th>Saturday</th>
</tr>

<!-- Calendar (days) start here -->

HTML;
}

// End docheader()
// Do the document footer (close tags, end doc)
function docfooter() {

    print <<<HTML
<!-- Close all open tags, end document -->
</table>
    </div>
</form>
</body>
</center>
</html>

HTML;
}

// End docfooter()
// Print an empty day (cell)
function emptyday() {
//include 'search.php';
    print <<<HTML
  <td align="right" valign="top">&nbsp;</td>

HTML;
}

// End emptyday()
// Print a day cell
function day($today, $month, $day, $year) {


    $curday = $month . "/" . $day . "/" . $year;
    if ($curday == $today) {
        $font = " style=\"color: red;\"";
    } else {
        $font = "";
    }

    print <<< HTML
    <form action="addEvent.php" name="myForm" method="post">
    <td align="right" onMouseover="this.bgColor='lightblue'"onMouseout="this.bgColor='#FFFFFF'" 
         valign="top" value="$day" id="day" type="submit" onclick="openWin()" $font>$day<br>
HTML;
    
}

function getEvents2($month, $year, $day) {


    include 'search.php';
    print <<<HTML
    <div class="three">           

HTML;
    $result = mysql_query($select);
    while ($row = mysql_fetch_array($result)) {
        if ($row['day'] == $day) {
            if($row['repeat'] == "yes"){
            echo "" . $row['dayEvent'] . "<br>";
            }else if($row['year'] == $year){
                echo "" . $row['dayEvent'];
            }
        }
    }"</td>";
    HTML;
}

// End day()
// Open or close a row
function weekrow($cmd) {

    switch ($cmd) {
        case "open":
            print "<tr class=\"week\">\n";
            break;
        case "close":
            print "</tr>\n";
            break;
    }
}

// End weekrow()
// Main program body
function main() {

// Set the date vars by default, POST, or GET
    $vars = setvars();
    $today = $vars['today'];
    $month = $vars['month'];
    $year = $vars['year'];
    $cmd = $vars['cmd'];

// Do the header and open first row
    getEvents($month, $year);
    docheader($month, $year);
    weekrow("open");
//include 'search.php';
// Set up first weekday and 1st day (m/1/y)
    $first_weekday = date("w", strtotime($month . "/1/" . $year)) + 1;
    $day = 1;

// Print empty days up to the first weekday of month
    for ($weekday = 1; $weekday < $first_weekday; $weekday++) {
        emptyday();
    }


// Do rest of month while we have a valid date
    while (checkdate($month, $day, $year)) {
// If SUN, open the row
        if ($weekday == 1) {
            weekrow("open");
        }
// Print day and increment
        day($today, $month, $day, $year);
        getEvents2($month, $year, $day);
        $weekday++;
        $day++;
// If SAT, close row reset weekday
        if ($weekday > 7) {
            weekrow("close");
            $weekday = 1;
        }
    }

// Close current week
    while ($weekday != 1 && $weekday <= 7) {
        emptyday();
        $weekday++;
    }

// Close document    
    docfooter();
}

// End main();
// Kick it all off
main();
?>
