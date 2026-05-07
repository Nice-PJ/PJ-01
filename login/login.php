<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.0.slim.min.js">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>

                <div class="card-body">
                    <h4 class="title text-center mt-4">
                        Login
                    </h4>
                    <form action="login_db.php" method="post" class="form-box px-3">
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php } ?>
                        <div class="form-input">
                            <span><i class="fas fa-user"></i></span>
                            <input type="text" name="username" placeholder="UserID" tabindex="10" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fas fa-key"></i></span>
                            <input id="password" type="password" name="password" placeholder="Password (5-20 characters)" required>
                        </div>

                        <div class="mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb1" onclick="showpass0()">
                                <label class="custom-control-label" for="cb1">Show Password</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="signin" class="w-100 btn btn-block text-uppercase">
                                Login
                            </button>
                        </div>
                        <div class="mb-3">
                            <a href="../index.php" class="w-100 btn btn-block home-link">
                                กลับหน้าหลัก
                            </a>
                        </div>

                        <hr class="my-4">

                        <!-- <div class="text-center mb-2">
                        Don't have an account?
                        <a href="#" class="register-link">
                            Register here
                        </a>
                    </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main2.js"></script>
</body>

</html>