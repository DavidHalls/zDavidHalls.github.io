<?php
//$product_id = $_POST['Select_Product'];
$select = "select * from Products.Product where idProduct = '" . $product_id . "'";
$return = mysql_query($select);

while ($row = mysql_fetch_array($return)) {
    $image = "productImages/" . $row['idProduct'] . ".jpg";
    if ($row['idProduct'] == $product_id) { 
            print <<<HTML
<table cell-spacing="5" style="margin-left:-55px">    
    <tbody>
    <tr>
    <td align="left" width="100px">Item Name</td>
    <td align="left" width="375px">Item Description</td>
    <td align="left" width="200px">Very Sensible Price</td>
    </tr>
    <tr>
    <td align="left">
HTML;
            echo $row['ProdName'];
            print <<<HTML
        </td>
    <td align="left">
HTML;
            echo $row['ProdDesc'];
            print <<<HTML
   </td>
        <td align="left">$
HTML;
            echo $row['Price'];
            print <<<HTML
        <td>
HTML;
            echo '<img src = "' . $image . '" width = "225" height = "225" alt = "1"/>';
            print <<<HTML
        
</tr>
    </tbody>
    </table>
HTML;
            break;
        } else {
            echo "You have not selected a product to view";
        }
//}
    }
    ?>


