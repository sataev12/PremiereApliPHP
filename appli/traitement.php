<?php

    session_start();
    if(isset($_POST['submit'])){

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if ($name && $price && $qtt) {
        $product =[
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt,
            // true => $isSuccess
        ];

        $_SESSION['products'][] = $product;
        $_SESSION['flash_message'] = "J'ai ajouté un produit";
    }  

    }

    header("Location:index.php");


