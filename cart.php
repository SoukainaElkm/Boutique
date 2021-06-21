<?php 
    session_start();
    if(isset($_REQUEST['delete'])) {
        foreach ($_SESSION['cart'] as $id=>$value) {
            if($value['product_id'] == $_REQUEST['idP']) {
                unset($_SESSION['cart'][$id]);
                echo "<script>alert('produit supprimé')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="style/style.css">

    <title>Le Panier</title>
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <div class="container2"  style="padding-left:50px;">
        <h3>Mon panier</h3>
        <div class="row text-center py-5">
            <?php
            
            if (!$connect = mysqli_connect("localhost", "root", "")) {
                exit("Desolé, imposible de se connecter au localhost");
            }
            if (!mysqli_select_db($connect, 'boutique')) {
                exit("Desolé, impossible d'accéder a la base de données boutique");
            }
            $data = mysqli_query($connect, "SELECT * FROM produits");
            $product_id = array_column($_SESSION['cart'], 'product_id');
            while ($ligne = mysqli_fetch_row($data)) {
                foreach ($product_id as $id) {
                    if ($ligne[0] == $id) {
                        echo "<div class=\"col-md-3 col-sm-3 my-1 my-md-0\">
                            <form action=\"cart.php\" methode=\"post\">
                                <div>
                                    <img src=" . $ligne[4] . " alt=\"image\" class=\"img-fluid card-img-top\">
                                </div>
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">" . $ligne[1] . "</h5>
                                    <p class=\"card-text\">" . $ligne[2] . "</p>
                                    <h5>
                                        <small><s class=\"text-secondary\">" . ($ligne[3] - 1) . "$</s></small>
                                        <span class=\"price\">" . $ligne[3] . "$</span>
                                        <input type=\"hidden\" name =\"idP\" value=\"".$ligne[0]."\">
                                        <button type=\"submit\" name=\"delete\" class=\"btn btn-danger my-3\">Supprimer</button>
                                    </h5>
                                </div>
                            </form>
                        </div>";
                    }
                }
            } ?>
        </div>
    </div>

</body>

</html>