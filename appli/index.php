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
            <a class="btn btn-primary" href="./index.php"><span class="glyphicon"></span>Ajouter produit</a>
            <a class="btn btn-light position-relative" href="./recap.php"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php 
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                        echo "<p>Vous n'avez pas ajouter les produits</p>";
                }else{
                        echo count($_SESSION['products']);
                }
                ?>
            </span>Panier</a>
            
        </div>
        
        <form class="form" action="traitement.php" method="post">
            <p>
                <label for="name">
                    Nom du produit : 
                    <input type="text" name="name" class="form-control" placeholder="Nom">
                    <span class="help-inline"><?php echo $nameErrore?></span>
                </label>
            </p>
            <p>
                <label for="price">
                    Prix du produit : 
                    <input type="number" step="any" name = "price" class="form-control" placeholder="Prix">
                    <span class="help-inline"><?php echo $priceErrore?></span>
                </label>
            </p>
            <p>
                <label for="quantite">
                    Quantité désirée : 
                    <input type="number" name="qtt" value="1" class="form-control">
                    <span class = "help-inline"><?php echo $quantiteErrore ?></span>
                </label>
            </p>
            <p>
                <input class="btn btn-success" type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>