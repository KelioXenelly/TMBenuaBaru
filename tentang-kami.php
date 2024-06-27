<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benua Baru | Tentang Kami</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    body {
        padding-top: 50px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center" style="height: 40vh;">
        <div class="container text-center text-white">
            <h1>Tentang Kami</h1>
        </div>
    </div>

    <!-- Body -->
    <div class="container py-5">
        <h2 class="mb-4">Sejarah</h2>

        <div class="row">
            <div class="col-lg-6 mb-5 bg-body-secondary rounded p-3">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae magni qui veritatis ipsum, id,
                    possimus eum corrupti aliquam nam ex libero perferendis sint iste sed facere voluptatibus dolorum 
                    facilis distinctio sunt numquam voluptatum? Minus recusandae tenetur ad corrupti velit saepe ipsam 
                    eos accusantium reprehenderit natus facere nobis eaque debitis deleniti dolorum corporis repellendus 
                    voluptates, dolorem voluptatum amet maxime praesentium mollitia! Ipsum dolor eveniet ea dicta rerum 
                    hic illo? Architecto, voluptatibus minima ratione quisquam voluptatum, aspernatur esse accusamus cum 
                    nemo rem libero soluta repudiandae neque nihil modi laudantium officiis. Necessitatibus officia facilis 
                    illo veniam incidunt quis, mollitia dolore totam veritatis earum? Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Id cum quia unde architecto quos et doloribus dolorum atque asperiores quam!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium inventore nemo sequi, aliquid 
                    velit nesciunt laboriosam minus ratione natus a.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="img/BenuaBaru_Logo.png" alt="" style="height: auto; width: 60%; border-radius: 50%;" >
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>