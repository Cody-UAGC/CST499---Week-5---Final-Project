<?php
session_start();
	error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>File Upload Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <?php 
    include_once 'master.php';
?>
    <!-- action="upload_submit.PHP"-->
    <form enctype="multipart/form-data" action="" method="POST">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="jumbotron">
                        <h1 class="display-4">Submit a File</h1>
                        <p class="lead">Choose a file and upload it
                        <p>
                            <hr class="my-4">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uploadFile">Upload File</label>
                                    <!-- MAX_FILE_SIZE must precede the file input field -->
                                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                    <!-- Name of input element determines name in $_FILES array -->
                                    <input name="userfile" type="file" />
                                    <input type="submit" value="Upload" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </form>

</body>

</html>
