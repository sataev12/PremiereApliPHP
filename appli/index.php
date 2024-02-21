<?php
    session_start();
    ob_start();
?>

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

    <!-- Temporisation sortie appliPHP -->
    <?php   
    //Recuperer et effacer le contenu de la temparisation, le contenu est stocké dans la variable $content             
    $content = ob_get_clean();
    //Inclure le fichier
    require_once "template.php"; ?>
