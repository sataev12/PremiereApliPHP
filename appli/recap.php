<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styleRecap.css">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session ...</p>";
        }else{
            echo 
                "<div class='container-btn'>
                    <a class='btn btn-primary' href='./index.php'><span class='glyphicon'></span>Ajouter produit</a>
                </div>
                 <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Supprimer</th>
                        </tr>
                    <thead>
                    <tbody>";
        $totalGFeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>"."<a class='btn btn-light' href='traitement.php?action=up-qtt&index=$index'> + </a>".$product['qtt']."<a class='btn btn-light' href='traitement.php?action=down-qtt&index=$index'> - </a>"."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>"."<a class='btn btn-danger' href='traitement.php?action=delete&index=$index'>Supprimer</a>"."</td>",
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
    <div>    
                <?php 
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                        echo $_SESSION['flash_message'];
                    }else{
                        echo $_SESSION['flash_message'];
                        unset($_SESSION['flash_message']);
                    }    
                ?>
            </div>     
   
   <a class='btn btn-danger' href="traitement.php?action=clear">Vider le panier</a>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>    