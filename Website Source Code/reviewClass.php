<?php

session_start();
    include_once 'master.php';
    
    include_once 'config.inc.php';    
    include_once 'database.inc.php';

$databaseObject = new clsDatabase();
$databaseObject->setCon($con);


    $myUserFields = ["firstName", "lastName"];
    $myCountUser = (count($myUserFields));    
        
   
        for ($i = 0; $i <= ($myCountUser - 1); $i++){
        

    
            $sqlUser = sprintf("SELECT $myUserFields[$i] FROM tblregistration INNER JOIN tbluser ON tblregistration.userID = tbluser.userID");
    
            $databaseObject->setSQL($sqlUser);
    
            $databaseObject->DML_QUERY_FIELD_SINGLE($myUserFields[$i]);
    
            $myReturnUser = sprintf($databaseObject->getSingleReturn());
            $myUserArray[] = $myReturnUser;
    
    }
    
    
    $myClassFields = ["className", "semester", "classStart", "classEnd"];
    $myCountClass = (count($myClassFields));
        
        for ($i = 0; $i <= ($myCountClass - 1); $i++){
        
            $sqlClass = sprintf("SELECT $myClassFields[$i] FROM tblregistration INNER JOIN tblclass ON tblregistration.classID = tblclass.classID ORDER BY registrationID DESC LIMIT 1");
    
            $databaseObject->setSQL($sqlClass);
    
            $databaseObject->DML_QUERY_FIELD_SINGLE($myClassFields[$i]);
    
            $myReturnClass = sprintf($databaseObject->getSingleReturn());
            $myClassArray[] = $myReturnClass;
            
        }
    
 
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


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome</h1>
                    <p class="lead">Please review your class information and validate it's correctness
                    <p>
                        <hr class="my-4">


                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>First Name</label>";
                                    echo "<p>{$myUserArray[0]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Last Name</label>";
                                    echo "<p>{$myUserArray[1]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Class Name</label>";
                                    echo "<p>{$myClassArray[0]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Semester</label>";
                                    echo "<p>{$myClassArray[1]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Class Start Date</label>";
                                    echo "<p>{$myClassArray[2]}</p>";

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <?php

                                    echo "<label>Class End Date</label>";
                                    echo "<p>{$myClassArray[3]}</p>";

                                    ?>

                            </div>
                        </div>
                    </div>



                            </div>
                        </div>
                    </div>

                </div>
    
<?php 
    include 'footer.php';
?>

</body>

</html>
