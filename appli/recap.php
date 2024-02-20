<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session ...</p>";
        }else{
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",    
                    "<thead>",
                    "<tbody>";
        $totalGFeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                "</tr>";
            $totalGFeneral += $product['total'];        
        }    
        echo "<tr>",
                "<td colspan = 4>Total général : </td>",
                "<td><strong>".number_format($totalGFeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
             "</tr>",
        "</tbody>",
        "</table>";
        }           
   ?>          
</body>
</html>    