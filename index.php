<?php

// start session
session_start();

require_once("./utils/CreateDb.php");
require_once("./utils/component.php");

// Create instance of CreateDb class
$dataBase = new CreateDb("ProductDb", "ProductTb");

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array("product_id" => $_POST["product_id"]);



        // Create new session variable
        $_SESSION["cart"][0] = $item_array;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons icons CDN -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom styles -->
    <link rel="stylesheet" href="styles.css">

    <title>Shopping Cart V1</title>
</head>

<body>
    <?php require_once("utils/header.php"); ?>
    <div class="container">
        <div class="row text-center py-5">
            <!-- <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="post">
                    <div class="card d-flex justify-content-center shadow bg-white rounded">
                        <div class="img__box p-3 d-flex justify-content-center">
                            <img src="./assets/img/sega-astro.png" alt="sega-astro-city-mini-v" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                SEGA Astro City Mini V
                            </h5>
                            <h6>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </h6>
                            <p class="card-text">
                                Vertical screen. Includes a total of 22 titles,
                                including the first ported titles. Many of the
                                shooting games essential to arcade games used
                                to be played on a vertical screen. This title
                                uses a 4.6-inch vertical LCD screen to fully
                                reproduce the vertical screen specifications.
                            </p>
                            <h5>
                                <small><s class="text-secondary">$340</s></small>
                                <span class="price">$325</span>
                            </h5>
                            <button type="submit" name="add" class="btn btn-warning my-3">Add to Cart<i class='bx bxs-cart'></i></button>
                        </div>
                    </div>
                </form>
            </div> -->

            <?php
            // component(
            //     productId: 1,
            //     productName: "SEGA Astro City Mini V",
            //     productImg: "./assets/img/sega-astro.png",
            //     productDescription: "Vertical screen. Includes a total of 22 titles,
            //     including the first ported titles. Many of the
            //     shooting games essential to arcade games used
            //     to be played on a vertical screen. This title
            //     uses a 4.6-inch vertical LCD screen to fully
            //     reproduce the vertical screen specifications.",
            //     prevProductPrice: 340,
            //     productPrice: 325,
            // );

            $result = $dataBase->getData();
            while ($row = mysqli_fetch_assoc($result)) {
                component(
                    $row["product_name"],
                    $row["product_price"],
                    $row["product_prev_price"],
                    $row["product_description"],
                    $row["product_image"],
                    $row["id"],
                );
            }
            ?>

        </div>
    </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>