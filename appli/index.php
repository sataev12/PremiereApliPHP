<?php
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleIndx.css">
    <title>Ajout produit</title>
</head>
<body>

    <div class="container">
        <div class="container-btn">
            <!--Le lien  vers notre panier -->
            <a class="btn btn-primary" href="./index.php"><span class="glyphicon"></span>Ajouter produit</a>
            <a class="btn btn-light position-relative" href="./recap.php"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php //On affiche le nombre de produit dans notre panier
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                        echo "<p>Vous n'avez pas ajouter les produits</p>";
                }else{
                        echo count($_SESSION['products']);
                }
                ?>
            </span>Panier</a>
        </div>
        <!-- Form -->
        <form class="form" action="traitement.php?action=add" method="post">
            <p>
                <label for="name"> <!--Le champ de name-->
                    Nom du produit : 
                    <input type="text" name="name" class="form-control" placeholder="Nom">
                </label>
            </p>
            <p>
                <label for="price"> <!--Le champ de price-->
                    Prix du produit : 
                    <input type="number" step="any" name = "price" class="form-control" placeholder="Prix">
                </label>
            </p>
            <p>
                <label for="quantite"> <!--Le champ de quantité-->
                    Quantité désirée : 
                    <input type="number" name="qtt" value="1" class="form-control">
                </label>
            </p>
            <p>
                <!-- Submit de notre formulaire-->
                <input class="btn btn-success" type="submit" name="submit" value="Ajouter le produit">
            </p>
            <div>    
                <?php // Message de successe ou error
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                        echo $_SESSION['flash_message'];
                    }else{ // Message de error
                        echo $_SESSION['flash_message'];
                        unset($_SESSION['flash_message']);
                    }    
                ?>
            </div>    
            
        </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>