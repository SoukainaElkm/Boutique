<?php 

if (!$connect = mysqli_connect("localhost", "root", "")) {
    exit("Desolé, imposible de se connecter au localhost"); 
}
if (!mysqli_select_db($connect, "boutique")) {
    exit("Desolé, impossible d'accéder a la base de données boutique ");
}

    $content = file_get_contents('./products.json');
    $initial_products = json_decode($content);
    
        foreach($initial_products as $products) {
        
        
        $description = $products->description;
        $image = $products->image;
        $name = $products->name;
        $prix = $products->price;
        $ref = $products->sku;
        
        $sql = "INSERT INTO produits VALUES ('$ref','$name','$description','$price','$image')";
        $result = mysqli_query($connect, $sql);
    }
?>
