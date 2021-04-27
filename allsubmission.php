<?php

session_start();

if (!isset($_SESSION["un"])) {
    header("Location:login.php");
}

if (isset($_SESSION['un'])) {
    $usernamee = $_SESSION['un'];
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/vlab.css"> -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="bootstrap-3.3.7/js/bootstrap.js"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="icon" type="image/png" href="img/ruet.png"> -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-1.12.0.min.js"></script>




    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"> </script> -->


</head>

<body>
    <?php
    require_once('header.php'); ?>

    <br><br>
    <h1 style="  text-align: center;">My Submission</h1>
    <div class="container">


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">PROBLEM STATEMENT</th>
                    <th scope="col">TIME</th>
                    <th scope="col">VERDICT</th>
                </tr>
            </thead>
            <tbody>


                <?php



                require_once('config.php');

                $sql = "select * from submission";
                $result = $connection->query($sql);
                // echo "in php";

                while ($row = mysqli_fetch_array($result)) {
                    if ($row['user'] == $usernamee) {
                ?>
                        <tr>
                            <th><?php echo "$row[title]" ?></th>
                            <th><?php echo "$row[date]" ?></th>
                            <th><?php if ($row['status'] == 1) echo "AC";
                                else echo "WA" ?></th>
                        </tr>;
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>


</body>

</html>