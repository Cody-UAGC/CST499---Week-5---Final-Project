<?php
    
    session_start();
	error_reporting(E_ALL);

    include_once 'login.inc.php';


if (isset($_SESSION['PERMISSIONS']) && $_SESSION['PERMISSIONS'] <> "STUDENT"){

    $privelageObject = new clsUserPermissions();
    $privelageObject->setPermission("READ");
}

    include 'master.php';
    returnClasses();

?>

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
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome to the Class Review Page</h1>
                    <p class="lead">Please review your class information and validate it's correctness
                    <p>
                    
                    <hr class="my-4">
                        
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#">Class Review</a></li>
                        <li><a href="profile.php">Account Summary</a></li>
                    </ul>
                    
                    <hr class="my-4">

                    <div class="container" id="class-removal-form">
        
                        <form class="form-inline" action="deleteClass.php" id="semester-delete-button-action">
                        <div class="row">

                        <div class="col-md-5" id="semester-delete-drop-down">
                            <div class="form-group">
                                <label for="SEMESTER_DELETE">Semester: </label>
                                <select class="form-control" id="SEMESTER_DELETE" name="SEMESTER_DELETE">
                                    <?php populateDropdown(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-7" id="sql-query-return-table">
                            <table class="table table-hover">

                                <tr>
                                    <th>Class</th>
                                    <th>Semester</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>

                                <tr>
                                    <?php populateTable();?>
                                </tr>

                            </table>
                        </div>

                        </div>

                        <div class="row">

                            <div class="col-md-5" id="class-delete-drop-down">
                                <div class="form-group">
                                    <label for="REMOVE_CLASS">Remove Class: </label>
                                    <select class="form-control" id="REMOVE_CLASS" name="REMOVE_CLASS">
                                    <option value="NULL"></option>
                                    <option>MATH 220</option>
                                    <option>ENG 101</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" method="post">Remove</button>
                            </div>

                        </div>

                        </div>
        
                        </form>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>

</body>

</html>
    
<?php

    function returnClasses(){
        
        include 'config.inc.php';    
        include 'database.inc.php';

        $databaseObject = new clsDatabase();
        $databaseObject->setCon($con);
  
        $myQueryReturn = array(0=>array(),1=>array(),2=>array(),3=>array());
        
        $myFields = array("className", "semester", "classStart", "classEnd");
        
        $sql = sprintf("SELECT className, semester, classStart, classEnd FROM tblregistration INNER JOIN tblclass ON tblregistration.classID = tblclass.classID");

        $databaseObject->setSQL($sql);

        //Return requested database fields to the page. Forward the results to a new page.
        for ($i = 0; $i <= count($myFields) - 1; $i++) {
        
            $databaseObject->DML_QUERY_FIELD($myFields[$i]);
                            
            $myQueryReturn[$i] = $databaseObject->getReturn();
        }
        
        $GLOBALS['myQueryReturn'] = $myQueryReturn;
    }

    function populateTable(){
        
        $myQueryReturn = $GLOBALS['myQueryReturn'];
    
        if (isset($myQueryReturn[0][1])){                    
            echo "<tr>";
                echo "<td>{$myQueryReturn[0][1]}</td>";
                echo "<td>{$myQueryReturn[1][1]}</td>";
                echo "<td>{$myQueryReturn[2][1]}</td>";
                echo "<td>{$myQueryReturn[3][1]}</td>";
            echo "</tr>";
        }

        if (isset($myQueryReturn[0][2])){        
            echo "<tr>";
                echo "<td>{$myQueryReturn[0][2]}</td>";
                echo "<td>{$myQueryReturn[1][2]}</td>";
                echo "<td>{$myQueryReturn[2][2]}</td>";
                echo "<td>{$myQueryReturn[3][2]}</td>";
            echo "</tr>";
        }
        
        if (isset($myQueryReturn[0][3])){
            echo "<tr>";
                echo "<td>{$myQueryReturn[0][3]}</td>";
                echo "<td>{$myQueryReturn[1][3]}</td>";
                echo "<td>{$myQueryReturn[2][3]}</td>";
                echo "<td>{$myQueryReturn[3][3]}</td>";
            echo "</tr>";
        }
        
        if (isset($myQueryReturn[0][4])){
            echo "<tr>";
                echo "<td>{$myQueryReturn[0][4]}</td>";
                echo "<td>{$myQueryReturn[1][4]}</td>";
                echo "<td>{$myQueryReturn[2][4]}</td>";
                echo "<td>{$myQueryReturn[3][4]}</td>";
            echo "</tr>";
        }                   
    }

    function populateDropdown(){
        
        $myQueryReturn = $GLOBALS['myQueryReturn'];
        
        if (isset($myQueryReturn[0][1]) && $myQueryReturn[1][1] == "Spring"){                    
            echo "<option>Spring</option>";
        }
        
        if (isset($myQueryReturn[0][1]) && $myQueryReturn[1][1] == "Summer"){                    
            echo "<option>Summer</option>";
        }
        
        if (isset($myQueryReturn[0][1]) && $myQueryReturn[1][1] == "Fall"){                    
            echo "<option>Fall</option>";
        }
        
        
        
        if (isset($myQueryReturn[0][2]) && $myQueryReturn[1][2] == "Spring"){                    
            echo "<option>Spring</option>";
        }
        
        if (isset($myQueryReturn[0][2]) && $myQueryReturn[1][2] == "Summer"){                    
            echo "<option>Summer</option>";
        }
        
        if (isset($myQueryReturn[0][2]) && $myQueryReturn[1][2] == "Fall"){                    
            echo "<option>Fall</option>";
        }
        
        
        
        if (isset($myQueryReturn[0][3]) && $myQueryReturn[1][3] == "Spring"){                    
            echo "<option>Spring</option>";
        }
        
        if (isset($myQueryReturn[0][3]) && $myQueryReturn[1][3] == "Summer"){                    
            echo "<option>Summer</option>";
        }
        
        if (isset($myQueryReturn[0][3]) && $myQueryReturn[1][3] == "Fall"){                    
            echo "<option>Fall</option>";
        }
        
        
        
        if (isset($myQueryReturn[0][4]) && $myQueryReturn[1][4] == "Spring"){                    
            echo "<option>Spring</option>";
        }
        
        if (isset($myQueryReturn[0][4]) && $myQueryReturn[1][4] == "Summer"){                    
            echo "<option>Summer</option>";
        }
        
        if (isset($myQueryReturn[0][4]) && $myQueryReturn[1][4] == "Fall"){                    
            echo "<option>Fall</option>";
        }
    }

?>

