<?php
    session_start();
    ob_start();
?>
    <link rel="stylesheet" href="./styleRecap.css">
</head>
<body>
    <!-- Pour afficher le code de notre table-->
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            //Si notre tableau est vide, on affiche ce message
            echo "<p>Aucun produit en session ...</p>";
        }else{
            echo //Avec les class de bootstrap on ajouts le style de notre tableau
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
        //On parcours notre table products avec Foreach en affichant chaque produits
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
        echo "<tr>", //Total de notre tab
                "<td colspan = 4>Total général : </td>",
                "<td><strong>".number_format($totalGFeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
             "</tr>",
        "</tbody>",
        "</table>";
        }           
   ?> 
   <!-- Message de suppression des produits-->
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
   <!-- Button pour vider le panier -->
   <a class='btn btn-danger' href="traitement.php?action=clear">Vider le panier</a>
   <!-- Temporisation sortie appliPHP -->
   <?php 
    $t = "Recapitulative des produits";  
    //Recuperer et effacer le contenu de la temparisation, le contenu est stocké dans la variable $content             
    $content = ob_get_clean();
    //Inclure le fichier
    require_once "template.php"; ?>
      
