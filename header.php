<header id="header" >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="display:flex;justify-content:center;">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i>Soukaina's BOUTIQUE
            </h3>
        </a>
        <button class="navbar-toggler"
        type="botton"
        data-toggle="collapse"
        data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        arialabel="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>My Cart <?php 
                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                            }else {
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }
                        ?>
                    </h5>
                </a>
            </div>
        </div>
        <ul>
                <li> <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?> <a href="Authentification/signout.php" class="logout"> <i class="fas fa-sign-out-alt" ></i> </a></li>
                <li> <a href="https://github.com/SoukainaElkm/Boutique" target="_blank"><i class="fab fa-github fa-lg"></i></a> </li>
        </ul>
    </nav>
</header>