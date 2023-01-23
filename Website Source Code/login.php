<?php 

error_reporting(E_ALL);
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include_once 'master.php'; 
    ?>

    <form action="login_submit.php">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="jumbotron">
                        <h1 class="display-4">Welcome to the Login Page</h1>
                        <p class="lead">Login to your account or create one on the accouint creation page
                        <p>
                            <hr class="my-4">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="EMAILADDRESS">Email Address</label>
                                    <input type="text" class="form-control" name="EMAILADDRESS">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="PASSWORD">Password</label>
                                    <input type="text" class="form-control" name="PASSWORD">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary" method="post">Login</button>
                            <a href="accountCreation.php">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <?php require_once 'footer.php'; ?>

</body>

</html>
