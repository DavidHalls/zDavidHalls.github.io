<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Friends and Family Form</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
    </head>
    <?php
        echo "adding<br>";
        require_once 'dblogin.php';
        $db_server = mysql_connect($db_hostname, $db_username, $db_password);
        if (!$db_server)
            die("Unable to connect to server." . mysql_error());
        $select = "SELECT * FROM Movies.Director order by LastName, FirstName";
        if (isset($_POST['addUser'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $birthday = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
            $username = $_POST['myusername'];
            $password = $_POST['mypassword'];
            $gender = $_POST['sex'];
            $relationship = $_POST['relation'];

            //INSERT INTO `Library`.`Movies` (`Title`, `Director`, `Lead`, `Genre`, `Release`, `rating`) VALUES ('Jaws', '1', '5', 'action', '1975-06-01', '5')
            $insert = "INSERT INTO `Family`.`Contacts` (`FirstName`, `LastName`, "
                    . "`Phone`, `Address`, `City`, `State`, `Zip`, `BirthDate`, "
                    . "`Username`, `Password`, `Gender`, `Relationship`) VALUES ('$fname', "
                    . "'$lname', '$phone', '$address', '$city', '$state', "
                    . "'$zip', '$birthday', '$username', '$password', '$gender', '$relationship')";

            //echo mysql_query($insert);
            //Now we load the result of the query into a variable to make sure we succeeded.
            $success = mysql_query($insert);
            if ($success == FALSE) {
                $failmess = "Whole query " . $insert . "<br>";
                echo $failmess;
                die('Invalid query: ' . mysql_error());
            } else {
                $message = "insert complete";
            }
        }
        ?> 
    
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!--<script src="FormValFF.js"></script>
    <script language="Javascript">
 
    </script>-->
    
    <body>
        
        <!--menu-->
        <div class="banner">
             <header id="header" class="clear">
    <div class="a">
      <h1><a style="color:white">Friend and Family contact list</a></h1>
      <!--<h2>Associate Professor at SLCC</h2>-->
    </div>
   
  </header>
        </div>
        <!-- content -->
        <div class="one">
            <div id="container" class="clear">
                <!-- form -->
                <section id="slider" class="form">

                    <h2>Fill out the form!</h2>
                    <form class="two" id="Addressbook" method="post" action="FandFResults.php" onsubmit="return validateForm()">
                        <table id="two" cellpadding="0" cellspacing="1">
                            <tr>
                                <td colspan="3">
                                    Please feel free to enter the name or phone number of the person you are looking 
                                    for to get the contact information.</td>
                            </tr>
                            <tr>
                                <td>&nbsp;
                                </td>
                                <td>&nbsp;
                                </td>
                                <td>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    First Name</td>
                                <td align="left">
                                    <input id="fname" type="text" name="fname" size="35" /> </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Last Name</td>
                                <td align="left">
                                    <input id="lname" name="lname" type="text" size="35" /></td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Phone Number</td>
                                <td align="left">
                                    <input id="phone" name="phone" type="text" size="35" /></td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Address</td>
                                <td align="left">
                                    <input id="address" name="address" type="text" size="35" /></td>
                                <td>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    City</td>
                                <td align="left">
                                    <input id="city" name="city" type="text" size="35" /></td>
                                <td>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    State</td>
                                <td align="left" class="selection">
                                    <select name="state">
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </td>
                                <td class="style2">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Zip</td>
                                <td align="left" >
                                    <input id="zip" name="zip" type="text" size="35" /></td>
                                <td>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Birthday</td>
                                <td align="left" ><select name="month">
                                        <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>                                    </select>
                                    <select name="day">
                                        <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>                                    </select>
                                    <select name="year">
                                        <option value='2015'>2015</option><option value='2014'>2014</option><option value='2013'>2013</option><option value='2012'>2012</option><option value='2011'>2011</option><option value='2010'>2010</option><option value='2009'>2009</option><option value='2008'>2008</option><option value='2007'>2007</option><option value='2006'>2006</option><option value='2005'>2005</option><option value='2004'>2004</option><option value='2003'>2003</option><option value='2002'>2002</option><option value='2001'>2001</option><option value='2000'>2000</option><option value='1999'>1999</option><option value='1998'>1998</option><option value='1997'>1997</option><option value='1996'>1996</option><option value='1995'>1995</option><option value='1994'>1994</option><option value='1993'>1993</option><option value='1992'>1992</option><option value='1991'>1991</option><option value='1990'>1990</option><option value='1989'>1989</option><option value='1988'>1988</option><option value='1987'>1987</option><option value='1986'>1986</option><option value='1985'>1985</option><option value='1984'>1984</option><option value='1983'>1983</option><option value='1982'>1982</option><option value='1981'>1981</option><option value='1980'>1980</option><option value='1979'>1979</option><option value='1978'>1978</option><option value='1977'>1977</option><option value='1976'>1976</option><option value='1975'>1975</option><option value='1974'>1974</option><option value='1973'>1973</option><option value='1972'>1972</option><option value='1971'>1971</option><option value='1970'>1970</option><option value='1969'>1969</option><option value='1968'>1968</option><option value='1967'>1967</option><option value='1966'>1966</option><option value='1965'>1965</option><option value='1964'>1964</option><option value='1963'>1963</option><option value='1962'>1962</option><option value='1961'>1961</option><option value='1960'>1960</option><option value='1959'>1959</option><option value='1958'>1958</option><option value='1957'>1957</option><option value='1956'>1956</option><option value='1955'>1955</option><option value='1954'>1954</option><option value='1953'>1953</option><option value='1952'>1952</option><option value='1951'>1951</option>                                    </select>
                                </td>
                                <td>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Username: </td>
                                <td align="left" ><input name="myusername" type="text" id="myusername" maxlength="15"><span id="user-result"></span>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Password: </td>
                                <td align="left" ><input name="mypassword" type="password" id="mypassword"></td>
                            </tr>
                            <tr>
                                <td align="right">Sex: </td>
                                <td align="left" ><input name="sex" type="radio" checked="checked" value="Male">Male <input name="sex" type="radio" id="mypassword" value="Female">Female</td>
                            </tr>
                            <tr>
                                <td align="right" >
                                    Relationship</td>
                                <td align="left" class="selection">
                                    <select name="relation">
                                        <option value="friend">Friend</option>
                                        <option value="grand">GrandParent</option>                                        
                                        <option value="child">Child</option>
                                        <option value="sibling">Sibling</option>
                                        <option value="parentSib">Aunt/Uncle</option>
                                        <option value="cousin">Cousin</option>
                                        <option value="coworker">Co-worker</option>
                                        <option value="enemy">Enemy</option>
                                    </select>
                                </td>
                                <td class="style2">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td> <input class="myButton" id="button_Search" type="submit" value="Search" name="requestType"/> </td>
                                            <td><input class="myButton" id="Button_update" type="submit" value="Update" name="requestType" onclick="return ValidUpdate()" /></td>
                                            <td><input class="myButton" id="Button_Input" type="submit" value="Create" name="requestType" onclick="return ValidCreate()"/></td>
                                        </tr>
                                    </table>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </section>                
                <!-- / content body -->
            </div>
        </div>
        <!-- Footer -->
        <div class="wrapper row3">
            <footer id="footer" class="clear">
                <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">D Hunter</a></p>

            </footer>
        </div>

    </body>
    
</html>