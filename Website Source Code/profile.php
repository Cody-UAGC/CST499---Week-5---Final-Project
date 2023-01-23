<?php
    
    session_start();
	error_reporting(E_ALL);

    include_once 'login.inc.php';

if (isset($_SESSION['PERMISSIONS']) && $_SESSION['PERMISSIONS'] <> "STUDENT"){

    $privelageObject = new clsUserPermissions();
    $privelageObject->setPermission("READ");
}

    include 'master.php';
    include 'config.inc.php';    
    include 'database.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<?php
    
    $username = $_SESSION['USERNAME'];

    $myField = ["email", "password", "firstName", "lastName", "address", "phone", "salary", "SSN"];
    
    $myCount = (count($myField));

    $databaseObject = new clsDatabase();

    $databaseObject->setCon($con);
   
    for ($i = 0; $i <= ($myCount - 1); $i++){
    
        $sql = sprintf("SELECT $myField[$i] FROM tbluser WHERE email='%s'", mysql_real_escape_string($username));
    
        $databaseObject->setSQL($sql);
    
        $databaseObject->DML_QUERY_FIELD_SINGLE($myField[$i]);
    
        $myReturn = sprintf($databaseObject->getSingleReturn());
        $myHTML[] = $myReturn;
    

    }
 
?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome to the Profile Page</h1>
                    <p class="lead">Please review your personal information and validate it's correctness
                    <p>
                    
                    <hr class="my-4">
                        
                <ul class="nav nav-pills">
                    <li class="active"><a href="#">Account Summary</a></li>
                    <li><a href="classReview.php">Class Review</a></li>
                </ul>
                    
                    <hr class="my-4">
                    
                    

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php
                                    
                                    echo "<label>Email Address</label>";
                                    echo "<p>{$myHTML[0]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>
                    
                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Password</label>";
                                    echo "<p>{$myHTML[1]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>First Name</label>";
                                    echo "<p>{$myHTML[2]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Last Name</label>";
                                    echo "<p>{$myHTML[3]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Address</label>";
                                    echo "<p>{$myHTML[4]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Phone Number</label>";
                                    echo "<p>{$myHTML[5]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Salary</label>";
                                    echo "<p>{$myHTML[6]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="tabcontent">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Social Secrity Number</label>";
                                    echo "<p>{$myHTML[7]}</p>";

                            ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php 
        
    include_once 'footer.php';
?>

</body>

</html>
