<?php

session_start();	

error_reporting(E_ALL);
echo "You are browsing as a: " . $_SESSION['PERMISSIONS'];
include 'master.php';

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

    <div class="container">
        <form class="form-inline" action="classRegistration_submit.php">
            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="SEMESTER_SELECTION">Search Semester: </label>
                        <select class="form-control" id="SEMESTER_SELECTION" name="SEMESTER_SELECTION">
                            <option value="NULL"></option>
                            <option>Spring</option>
                            <option>Summer</option>
                            <option>Fall</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" method="post">Search</button>
                    </div>

                </div>

                <div class="col-md-7">
                    <table class="table table-hover">
                        <tr>
                            <th>Semester</th>
                            <th>Class</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </div>

            </div>
        </form>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
