<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap cdn -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
  crossorigin="anonymous">

  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
  integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="../style/style.css">

  <title>Register</title>
</head>
<body>
        <nav>
            <ul>
                <li> Soukaina EL KAMOUNI's Boutique  </li>
            </ul>
        </nav>
        <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="INSCRIPTION">INSCRIPTION</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="user_name" id="user_name"
                                               class="form-control input-sm" placeholder="UserName" REQUIRED>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm"
                                       placeholder="Email Address" REQUIRED>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password"
                                               class="form-control input-sm" placeholder="Password" REQUIRED>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation"
                                               id="password_confirmation" class="form-control input-sm"
                                               placeholder="Confirm Password" REQUIRED>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="INSCRIRE" class="btn btn-dark btn-block" name="enregistrer">
                            <center><a href="login.php">vous avez déja un compte ? connectez-vouz</a></center>
                        </form>
                        <?php
                        if (isset($_POST["enregistrer"])) {
                            $username = trim($_POST["user_name"]);
                            $email = trim($_POST["email"]);
                            $password = trim($_POST["password"]);
                            $passwordconfirmation =  trim($_POST["password_confirmation"]);
                            if ($password == $passwordconfirmation) {
                                if (!$connect = mysqli_connect("localhost", "root", "")) {
                                    exit("Desolé, Connexion a localhost impossible");
                                }
                                if (!mysqli_select_db($connect, "boutique")) {
                                    exit("Desolé, l'acces a la base site_bd impossible");
                                }

                                $reg = mysqli_query($connect, "SELECT * From utilisateur WHERE 	EMAIL='$email'");
                                $rows = mysqli_num_rows($reg);
                                if ($rows == 0) {
                                    $query = "INSERT INTO utilisateur (USERNAME, EMAIL, PASSWD) VALUES ('$username', '$email', '$password')";
                                    $result = mysqli_query($connect, $query);
                                    echo "<script> window.location.replace(\"login.php\"); </script>";
                                    exit;
                                } else {
                                    echo "<br><span style=\" font-weight:bold; color:red;\">Ce email deja inscrit</span>";
                                }
                            } else {
                                echo "<br><span style=\" font-weight:bold; color:red;\">les mots de passe ne sont pas identique</span>";
                            }
                        }
                        ?>
                    </div>
                </div>
</body>
</html>