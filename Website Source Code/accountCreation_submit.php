<?php 
session_start();
error_reporting( E_ALL );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <?php submitForm2Database();?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Submission Summary</h1>
                    <p class="lead">The following information was submitted for review:
                    <p>
                        <hr class="my-4">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php
                    
                                    $emailAddress = $_REQUEST['EMAILADDRESS'];

                                    echo "<label>Email Address</label>";
                                    echo "<p>{$emailAddress}</p>";

                                 ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    $password = $_REQUEST['PASSWORD'];

                                    echo "<label>Password</label>";
                                    echo "<p>{$password}</p>";

                                    ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php
                    
                                    $firstName = $_REQUEST['FIRSTNAME'];

                                    echo "<label>First Name</label>";
                                    echo "<p>{$firstName}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    $lastName = $_REQUEST['LASTNAME'];

                                    echo "<label>Last Name</label>";
                                    echo "<p>{$lastName}</p>";
                                
                                ?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    $address = $_REQUEST['ADDRESS'];

                                echo "<label>Address</label>";
                                echo "<p>{$address}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    $phoneNumber = $_REQUEST['PHONENUMBER'];
                                       
                                    echo "<label>Phone Number</label>";
                                    echo "<p>{$phoneNumber}</p>";
                                
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    $salary = $_REQUEST['SALARY'];

                                    echo "<label>Salary</label>";
                                    echo "<p>{$salary}</p>";
                                
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    $ssn = $_REQUEST['SSN'];

                                    echo "<label>Social Secrity Number</label>";
                                    echo "<p>{$ssn}</p>";

                                ?>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php

    function submitForm2Database(){
        
        include_once 'master.php';
        include_once 'config.inc.php';    
        include_once 'database.inc.php';

        $emailAddress = $_REQUEST['EMAILADDRESS'];
        $password = $_REQUEST['PASSWORD'];
        $firstName = $_REQUEST['FIRSTNAME'];
        $lastName = $_REQUEST['LASTNAME'];
        $address = $_REQUEST['ADDRESS'];
        $phoneNumber = $_REQUEST['PHONENUMBER'];
        $salary = $_REQUEST['SALARY'];
        $ssn = $_REQUEST['SSN'];

        $sql = sprintf("INSERT INTO tbluser(email, password, firstName, lastName, address, phone, salary, SSN) VALUES($emailAddress,$password, $firstName, $lastName, $address, $phoneNumber, $salary, $ssn)");

        $databaseObject = new clsDatabase();

        $databaseObject->setCon($con);

        $databaseObject->setSQL($sql);    

        $databaseObject->DML_STATEMENT();   
        
    }

?>
