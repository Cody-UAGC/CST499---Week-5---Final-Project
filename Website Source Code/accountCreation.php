<?php 
session_start();
error_reporting( E_ALL );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account Creation Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include 'master.php';?>

    <form action="accountCreation_submit.php">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="jumbotron">
                        <h1 class="display-4">Welcome. Create an Account Below.</h1>
                        <p class="lead">Create an account by entering your personal information
                        <p>
                            <hr class="my-4">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="emailAddress">Email Address</label>
                                    <input type="text" class="form-control" name="EMAILADDRESS" placeholder="name@example.com">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="PASSWORD" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" name="FIRSTNAME" placeholder="First Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" name="LASTNAME" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="ADDRESS" placeholder="example:150 green dr">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" name="PHONENUMBER" placeholder="example:5205555555">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="text" class="form-control" name="SALARY" placeholder="example:52000">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ssn">Social Security Number</label>
                                    <input type="text" class="form-control" name="SSN" placeholder="example:123456789">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary" method="post">Register</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php include 'footer.php';?>

</body>

</html>
