<?php

    session_start();
    
    if(isset($_GET['action'])) {

        switch ($_GET['action']) {
            case "add":
                # code...
                if(isset($_POST['submit'])){

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                }    


                if ($name && $price && $qtt) {
                    $product =[
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
            
                    $_SESSION['products'][] = $product;
                    $_SESSION['flash_message'] = "<div class='alert alert-success' role='alert'>
                        Produit est ajouté
                    </div>";
                }else{
                     $_SESSION['flash_message'] = "<div class='alert alert-danger' role='alert'>Error</div>";
                }  
               
    
            
                header("Location:index.php");
                break;
            case "clear":
                # code...
                
                    unset($_SESSION['products']);
                   
        
                // unset($_SESSION['products']);
                header("Location:recap.php"); die;
                break;
            case 'delete':

                    if ($index = $_GET['index']) {
                        # code...
                        unset($_SESSION['products'][$index]);
                        $_SESSION['flash_message'] = "<div class='alert alert-success' role='alert'>
                        Produit est supprimer
                    </div>";
                    }
                    header("Location:recap.php"); die;
                break;
            case 'up-qtt':
                if ($_SESSION['products'][$_GET['index']]['qtt']++) {
                    # code...
                
                }
                // $_SESSION['products'][$_GET['index']]['qtt']++;
                header("Location:recap.php"); die;
                break;
            case 'down-qtt':
                # code...
                if ($_SESSION['products'][$_GET['index']]['qtt']>1) {
                    # code...
                    $_SESSION['products'][$_GET['index']]['qtt']--;
                }else{
                    unset($_SESSION['products'][$_GET['index']]);
                }
              
                header("Location:recap.php"); die;
                break;
        }
    }; 

     
        
    


