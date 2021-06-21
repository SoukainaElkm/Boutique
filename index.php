<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script> window.location.replace(\"Authentification/login.php\"); </script>";
    }

    if(isset($_REQUEST['add'])) {
        if(isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'],"product_id");
            if(in_array($_REQUEST['product_id'],$item_array_id)) {
                echo "<script>alert('produit déja dans le panier')</script>";
                echo "<script>window.location='index.php'</script>";
            }else {
                $count = count($_SESSION['cart']);
                $item_array = array (
                    'product_id'=>$_REQUEST['product_id']
                );
                $_SESSION['cart'][$count] = $item_array;
            }
        }else {
            $item_array = array (
                'product_id'=>$_REQUEST['product_id']
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>EL KAMOUNI Soukaina</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
  <body>
        <?php
            require_once('header.php')
        ?>
        <div class="container2">
       <div class="row text-center py-5">
        <?php 
            if (!$connect = mysqli_connect("localhost", "root", "")) {
                exit("Desolé, imposible de se connecter au localhost");
            }
            if (!mysqli_select_db($connect, 'boutique')) {
                exit("Desolé, impossible d'accéder a la base de données boutique");
            }
            $data = mysqli_query($connect, "SELECT * FROM produits");
            while ($ligne = mysqli_fetch_row($data)) {
                echo "<div class=\"col-md-3 col-sm-3 my-1 my-md-0\">
                        <form action=\"index.php\" methode=\"post\">
                            <div>
                                <img src=".$ligne[4]." alt=\"image\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">".$ligne[1]."</h5>
                                <p class=\"card-text\">".$ligne[2]."</p>
                                <h5>
                                    <small><s class=\"text-secondary\">".($ligne[3]-1)."$</s></small>
                                    <span class=\"price\">".$ligne[3]."$</span>
                                </h5>
                                <button type=\"submit\" name=\"add\" class=\"btn btn-warning my-3\">Ajouter au panier<i class=\"fas fa-shopping-cart\"></i></button>
                                <input type=\"hidden\" name=\"product_id\" value=\"$ligne[0]\">
                            </div>
                        </form>
                    </div>";} ?>
        </div>
        </div>
</body>
</html>
