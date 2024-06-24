<?php
    session_start();
    require "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benua Baru | Sign In</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
    .login-fluid {
        background: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .92)), url('../img/login-bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .login-box {
        border-radius: 1rem;
        max-width: 80%;
        box-sizing: border-box;
    }
</style>

<body>
    <div class="login-fluid vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow bg-light">
            <div class="text-end fs-5 mb-3">
                <a type="button" class="btn-close me-end" href="../"></a>
            </div>
            <h2 class="mb-4 text-center fs-1"><b>Toko Mas Benua Baru</b></h2>

            <form action="" method="POST">
                <div data-mdb-input-init class="form-outline mb-2">
                    <label class="form-label" for="username">Username</label>
                    <input type="name" name="username" id="username" class="form-control form-control-lg" autocomplete="off" required/>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" autocomplete="off"/>
                </div>
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-success text-white btn-lg btn-block w-100 fs-5" 
                type="submit" name="loginBtn">Login</button>
            </form>
        </div>
        
        <div class="mt-3 text-center" style="width: 600px;">
            <?php
                if(isset($_POST["loginBtn"])) {
                    $username = htmlspecialchars($_POST["username"]);
                    $password = htmlspecialchars($_POST["password"]);

                    $queryUsers = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                    $usersNum = mysqli_num_rows($queryUsers);
                    $usersData = mysqli_fetch_array($queryUsers);
                    
                    if($usersNum > 0) {
                        if(password_verify($password, $usersData["password"])) {
                            $_SESSION["username"] = $usersData["username"];
                            $_SESSION["login"] = true;
                            header("location: ../adminpanel");                  
                        }
                        else {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Password salah, coba lagi!
                                </div>
                            ';
                        }
                    }
                    else {
                        echo '
                            <div class="alert alert-warning" role="alert">
                                Akun tidak tersedia
                            </div>
                        ';
                    }
                }
            ?>
        </div>
    </div>
    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>