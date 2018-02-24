<?php
session_start();
require_once 'dblogin2.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Unable to connect to server." . mysql_error());

$product_id = $_POST['Select_Product'];
//echo $product_id;
$action = $_POST['requestType'];
?>
<html>
    <head>
        <title>Shopping </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="view.css" rel="stylesheet" type="text/css"/> 
        <style>
        </style>
        <script>
            function reload(){
                location.reload();
            }
        </script>
    </head>
    <body style='background-color: #747a66'>
        <nav>
            <div>
                <a href="../CE02/" class='myButton'><b>Assignment 1</b></a>
                <a href="../CE05/ContactList.php" class='myButton'><b>Assignment 2</b></a>
                <a href="../CE04/" class='myButton'><b>Assignment 3</b></a>
                <a href="#" class='myButton'><b>E-Commerce</b></a>
                <a href="../CE14/Adventure.html" class='myButton'><b>Adventure Story</b></a>
            </div>
            
            <p style='align:left; vertical-align: bottom'>
                <?php
                if (!isset($_SESSION['user'])) {
                    $here = "<a href='../CE08/LoginPage.php' ><b>HERE</b></a>";
                    echo "You are not logged in. <br> Click $here to Log in. ";                    
                } else
                //echo $_SESSION['user'];
                //echo $first;
                    $select = "select * from Family.Contacts where Username = '" . $_SESSION['user'] . "'";
                $result = mysql_query($select);
                while ($row = mysql_fetch_array($result)) {
                    echo "<p><font color='white'>Welcome back <br>" . $row['FirstName'] . " " . $row['LastName']."</font>";
                    echo '<a href="../CE08/add.php" style="margin-left: 80%; font-size: 12px"><b>Update Password</b></a></p> ';
                }

                ?>
                                   

            </p>
        </nav>
    
        <div style="background:#a4ad90; height: 750px; width: 100px; margin-right: 90%; margin-left: 15px; position: fixed "></div>
        
        <form action="catalogue2.php" method="post" style="background:#e0edc5; margin-left: 115px; margin-right: 15px; ">
            <div align="right"><br>                
                Please select a product
                <select id="Select_Product" name="Select_Product">
                    <option name="input" >                        
                        <?php
                        $search = "select * from Products.Product";
                        $message = "Whole query " . $search;
                        $return = mysql_query($search);

                        if (!$return) {
                            $message = "Whole query" . $search;
                            echo $message;

                            //die("Invalid query: " . mysql_error());                            
                        }  else {
                            while ($row = mysql_fetch_array($return)) {
                                if($row['idProduct'] == $product_id){
                                    echo "<option name='select' selected value='" . $row['idProduct'] . "'>"  . "
                                 " . $row['ProdName'] . "</option>";
                                }
                                echo "<option name='select' value='" . $row['idProduct'] . "'>" . "
                                 " . $row['ProdName'] . "</option>";
                            }
                        }
                        ?></option>                       
                </select><br>                        

                <br><br>  
                <input id="button_Search" type="submit" value="Add" name="requestType"/>
                <input id="button_Search" type="submit" value="Remove" name="requestType"/>
                <input id="button_Search" type="submit" value="Empty" name="requestType"/>
                <input id="button_Search" type="submit" value="Info" name="requestType"/>
                <?php
                if (isset($_SESSION['user'])) {
                    print <<<HTML
                        <input id="button_Search" type="submit" value="Log Out" name="requestType"/>
HTML;
                }
                ?>
                
            </div>
            
            <div align="left" style="margin-left: 225px;" >
                <?php
                switch ($action) {
                    case "Add":
                        $_SESSION['cart'][$product_id] ++;
                        unset($product_id);
                        //echo $_SESSION['cart'];

                        break;
                    case "Remove":
                        $_SESSION['cart'][$product_id] --;
                        if ($_SESSION['cart'][$product_id] == 0)
                            unset($_SESSION['cart'][$product_id]);
                        break;
                    case "Empty":
                        unset($_SESSION['cart']);
                        break;
                    case "Info":
                        include 'info.php';
                        break;
                    case "Log Out":                        
                        session_destroy();                        
                        echo "You have been logged out!";
                        reload();                        
                        break;
                }
                if (!$_SESSION['cart']) {
                    echo "You have no items in your shopping cart";
                } else {
                    echo "<table border=\"1\" padding=\"3\" width=\"700px\">"
                    . "<td align=\"left\">Product</td><td>Quantity</td><td>Price</td>";
                    foreach ($_SESSION['cart']as $product_id => $quantity) {
                        //echo "<br> What's up DOC" . $product_id ."/".$quantity;
                        $a = array($product_id);
                        $sql = sprintf("select ProdName, ProdDesc, Price from Products.Product where idProduct = '" . $product_id . "'");

                        $result = mysql_query($sql);
                        if (mysql_num_rows($result) > 0) {
                            list($name, $desc, $price) = mysql_fetch_array($result);
                            $line_cost = $price * $quantity;
                            $total = $total + $line_cost;

                            echo "<tr>";
                            //echo "<td>".$product_id."</td>";
                            echo "<td align=\"left\" width=\"350px\">$name</td>";
                            echo "<td align=\"center\" width=\"100px\">$quantity</td>";
                            echo "<td align=\"center\" width=\"100px\">$" . money_format('%(#8n', $line_cost) . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "<tr><td align=\"right\">Total:</td><td></td><td>$$total</td></tr><br>";
                }

                mysql_close();
                ?> </div>
            
        </form>
        
    </body>  
</html>

