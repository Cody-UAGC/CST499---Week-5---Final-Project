<?php 

session_start();

error_reporting(E_ALL);
echo "You are browsing as a: " . $_SESSION['PERMISSIONS'];

include 'master.php';

    
$myVar = $_REQUEST['SEMESTER_SELECTION'];
//setcookie("SEMESTER_SELECTION", $myVar, time() + 3600);

$_SESSION['SEMESTER_SELECTION'] = $myVar;
        

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

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="jumbotron">
                    <h1 class="display-4">Welcome to the Registration Page</h1>
                    <p class="lead">Select classes in the drop-down menu.
                    <p>
                </div>

            </div>
        </div>
    </div>

    <div class="container" id="registration-form">
        
        <form class="form-inline" action="classRegistration_submit.php" id="semester-search-button-action">
            <div class="row">

                <div class="col-md-5" id="semester-search-drop-down">
                    <div class="form-group">
                        <label for="SEMESTER_SELECTION">Search Semester: </label>
                        <select class="form-control" id="SEMESTER_SELECTION" name="SEMESTER_SELECTION">
                            <?php setSemester(); ?>
                        </select>
                    </div>

                    <div class="form-group" id="search-button">
                        <button type="submit" class="btn btn-primary" method="post">Search</button>
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
                            <?php populateTable(); ?>
                        </tr>

                    </table>
                </div>

            </div>
        </form>

        <form class="form-inline" action="addClass_submit.php" id="add-class-button-action">
            <div class="row">

                <div class="col-md-5" id="add-class-drop-down">

                    <div class="form-group">
                        <label for="ADD_CLASS">Add Class: </label>
                        <select class="form-control" id="ADD_CLASS" name="ADD_CLASS">
                            <option value="NULL"></option>
                            <option>MATH 220</option>
                            <option>ENG 101</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" method="post">Add</button>
                    </div>

                </div>

            </div>
        </form>

    </div>

    <?php require_once 'footer.php'; ?>

</body>

</html>



<?php

    function setSemester(){
        
        $myVar = $_REQUEST['SEMESTER_SELECTION'];
                                        
        switch ($myVar) {
                                        
            case "Spring":
                echo "<option>{$myVar}</option>";
                echo "<option>Summer</option>";
                echo "<option>Fall</option>";
                break;
            case "Summer":
                echo "<option>{$myVar}</option>";
                echo "<option>Spring</option>";
                echo "<option>Fall</option>";
                break;
            case "Fall":
                echo "<option>{$myVar}</option>";
                echo "<option>Spring</option>";
                echo "<option>Summer</option>";
                break;

        }
        
    }

    function populateTable(){
        
        include 'config.inc.php';    
        include 'database.inc.php';
                            
        $mySemester = $_REQUEST['SEMESTER_SELECTION'];
        $myQueryReturn = array(0=>array(),1=>array(),2=>array(),3=>array());
        $myFields = array("className", "semester", "classStart", "classEnd");
        $sql = sprintf("SELECT className, semester, classStart, classEnd FROM tblclass WHERE semester='%s'", mysql_real_escape_string($mySemester));

        $myArray = array();
               
        $databaseObject = new clsDatabase();
        $databaseObject->setCon($con);
        $databaseObject->setSQL($sql);

        //Return requested database fields to the page. Forward the results to a new page.
        for ($i = 0; $i <= count($myFields) - 1; $i++) {
        
            $databaseObject->DML_QUERY_FIELD($myFields[$i]);
                            
            $myQueryReturn[$i] = $databaseObject->getReturn();
                                
        }
                            
        echo "<tr>";
            echo "<td>{$myQueryReturn[0][1]}</td>";
            echo "<td>{$myQueryReturn[1][1]}</td>";
            echo "<td>{$myQueryReturn[2][1]}</td>";
            echo "<td>{$myQueryReturn[3][1]}</td>";
        echo "</tr>";
                            
        echo "<tr>";
            echo "<td>{$myQueryReturn[0][2]}</td>";
            echo "<td>{$myQueryReturn[1][2]}</td>";
            echo "<td>{$myQueryReturn[2][2]}</td>";
            echo "<td>{$myQueryReturn[3][2]}</td>";
        echo "</tr>";  
                            
    }
?>
