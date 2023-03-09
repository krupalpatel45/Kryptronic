<?php
session_start(); //start session

$db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
if ($db->connect_error)
{
    die ("Connection failed: " . $db->connect_error);
}

############# add products to session #########################
if(isset($_POST["new_p"]))
{
    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
    }

    //we need to get product name and price from database.
    $statement = $mysqli_conn->prepare("SELECT prod_name,price FROM new_prod WHERE new_p=? LIMIT 1");
    $statement->bind_param('s', $new_product['new_p']);
    $statement->execute();
    $statement->bind_result($prod_name, $price);


    while($statement->fetch()){
        $new_product["prod_name"] = $prod_name; //fetch product name from database
        $new_product["price"] = $price;  //fetch product price from database

        if(isset($_SESSION["products"])){  //if session var already exist
            if(isset($_SESSION["products"][$new_product['new_p']])) //check item exist in products array
            {
                unset($_SESSION["products"][$new_product['new_p']]); //unset old item
            }
        }

        $_SESSION["products"][$new_product['new_p']] = $new_product; //update products with new item array
    }

    $total_items = count($_SESSION["products"]); //count total items
    die(json_encode(array('items'=>$total_items))); //output json

}

################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
        $cart_box = '<ul class="cart-products-loaded">';
        $total = 0;
        foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

            //set variables to use them in HTML content below
            $prod_name = $product["prod_name"];
            $price = $product["price"];
            $new_p = $product["new_p"];
            $quantity = $product["quantity"];

        }
        die($cart_box); //exit and output content
    }else{
        die("Your Cart is empty"); //we have empty cart
    }
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
    $product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

    if(isset($_SESSION["products"][$product_code]))
    {
        unset($_SESSION["products"][$product_code]);
    }

    $total_items = count($_SESSION["products"]);
    die(json_encode(array('items'=>$total_items)));
}
?>
