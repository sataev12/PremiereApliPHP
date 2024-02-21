<?php

    session_start();
    
    if(isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "add": // Pour ajouter les produits
                if(isset($_POST['submit'])){
                    //Verifications des champs de form
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                }    
                //Aprés le verif on ajoute les produit dans le table $products
                if ($name && $price && $qtt) {
                    $product =[
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
                    $_SESSION['products'][] = $product;
                    //Message successe
                    $_SESSION['flash_message'] = "<div class='alert alert-success' role='alert'>
                        Produit est ajouté
                    </div>";
                }else{//Message error
                     $_SESSION['flash_message'] = "<div class='alert alert-danger' role='alert'>Error</div>";
                }  
                header("Location:index.php");
                break;
            case "clear": //On vide le panier
                     unset($_SESSION['products']);
                header("Location:recap.php"); die;
                break;
            case 'delete': //On supprime le produit par le choix d'un utilisateur
                        unset($_SESSION['products'][$_GET['index']]);
                        $_SESSION['flash_message'] = "<div class='alert alert-success' role='alert'>
                        Produit est supprimer
                    </div>";
                    header("Location:recap.php"); die;
                break;
            case 'up-qtt'://On augmente le quantité de notre produit
                if ($_SESSION['products'][$_GET['index']]['qtt']++) {
                    //On mets à jours le prix total
                    $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price']*$_SESSION['products'][$_GET['index']]['qtt'];
                }
                header("Location:recap.php"); die;
                break;
            case 'down-qtt'://On diminue le quantité de notre produit
                if ($_SESSION['products'][$_GET['index']]['qtt']>1) {
                    $_SESSION['products'][$_GET['index']]['qtt']--;
                    $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price']*$_SESSION['products'][$_GET['index']]['qtt'];
                }else{
                    unset($_SESSION['products'][$_GET['index']]);
                }
                header("Location:recap.php"); die;
                break;
        }
    }; 

     
        
    


