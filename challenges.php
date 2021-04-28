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

    <?php
    require_once('contest.php');
    ?>
    <?php
    $id = $_POST['id'];
    //echo $id;
    $sql = "select * from  Code where id='$id'";
    $result = $connection1->query($sql);

    $row = mysqli_fetch_array($result);
    $Answerfilepath = "test_cases/$row[testcase]";
    ?>
    <div class="main">






        <div class="row cspace" style="margin-top:4px;">
            <div class="col-sm-8">
                <div class="form-group">

                    <div class="row log" style="padding:50px;margin-top:-75px;">
                        <div class="col-sm-10">
                            <div class="">
                                <h3 style="text-align:center; font-weight:bold;font-size:35px"><?php echo "$row[title]"; ?></h3>
                                <?php $problemTitle = $row['title']; ?>
                            </div>
                        </div>

                        <div class="col-sm-1">

                        </div>

                        <div class="col-sm-1">

                        </div>

                    </div>

                    <div class="container" style="width:800px;">
                        <h4>Description:
                            <?php
                            $filepath = "problem_statement/$row[file]";


                            if ($fh = fopen("$filepath", 'r')) {
                                while (!feof($fh)) {
                                    $line = fgets($fh);
                                    echo $line;
                                    echo "<br>";
                                }
                                fclose($fh);
                            }


                            ?> </h4>
                    </div>
                    <form action="compile.php" id="form" name="f2" method="POST">
                        <label for="lang">Choose Language</label>


                        <select class="form-control" name="language">
                            <option value="c" onclick="document.getElementById('writeyourcode').innerText='Write Your Code'">C</option>
                            <option value="cpp" onclick="document.getElementById('writeyourcode').innerText='Write Your Code'">C++</option>
                            <!-- <option value="cpp11">C++11</option> -->
                            <option value="java" onclick="console.log('java selected');document.getElementById('writeyourcode').innerText='Write Your Code with Class name as \'Main\'';alert('As you selected Java class name should be\r\n Main')">Java</option>


                        </select><br><br>

                        <label id="writeyourcode" for="ta">Write Your Code</label>
                        <textarea class="form-control" name="code" rows="25" cols="50"></textarea><br><br>
                        <label for="in">Enter Your Input</label>
                        <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>
                        <button type="submit" id="st" class="btn btn-success">Run Code</button><br><br><br>

                    </form>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#st").click(function() {
                                $("#div").html("Loading ......");
                            });
                        });
                    </script>

                    <script>
                        //wait for page load to initialize script
                        $(document).ready(function() {
                            //listen for form submission
                            $('#form').on('submit', function(e) {
                                //prevent form from submitting and leaving page
                                e.preventDefault();
                                // AJAX 
                                $.ajax({
                                    type: "POST", //type of submit
                                    cache: false, //important or else you might get wrong data returned to you
                                    url: "compile.php", //destination
                                    datatype: "html", //expected data format from process.php
                                    data: $('#form').serialize(), //target your form's data and serialize for a POST
                                    success: function(result) { // data is the var which holds the output of your process.php

                                        // locate the div with #result and fill it with returned data from process.php
                                        $('#div').html(result);
                                        // callSubmit();
                                        submitcode1();
                                    }
                                });
                            });
                        });
                    </script>

                    <label for="out">Output</label>
                    <textarea id='div' class="form-control" placeholder="Output" name="output" rows="10" cols="50" readonly></textarea><br><br><br>

                    <form action="code_submission.php" method="POST">
                        <input type="hidden" name="user_name" value="<?php echo $usernamee; ?>">
                        <input type="hidden" name="problem_title" value="<?php echo $problemTitle; ?>">
                        <input type="submit" onclick="alert('Your code has been submitted \r\n\r\nSolve Next Problem')" value="Submit Code">
                        <br><br><br>
                    </form>
                    <script>
                        var user = "<?php echo ($usernamee) ?>";
                        var title = "<?php echo ($problemTitle) ?>";
                        var file = "<?php echo ($Answerfilepath); ?>";
                        console.log(file);
                        var status;

                        function submitcode1() {
                            var xmlhttp;
                            var output = "";
                            if (window.XMLHttpRequest) {
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    // document.getElementById("demo").innerHTML =
                                    // console.log(this.responseText);
                                    output += this.responseText;
                                    var compileoutput = document.getElementById('div').innerHTML;
                                    if (output.localeCompare(compileoutput) == 0) {
                                        console.log("compiled output is correct");
                                        status = 1;

                                        // setcookie("gfg", "1", time() + 3600);
                                        // setcookie("gfg", "1", time() + (86400 * 30), "/");

                                        // cookie will expire in 1 hour, and will only be available
                                        // within the php directory + all sub-directories of php
                                        // setcookie("m", $value, time() + 3600, "/php/");
                                        // var input = document.createElement("input");
                                        // input.setAttribute("type", "hidden");
                                        // input.setAttribute("id", "hide");
                                        // input.setAttribute("name", "status_");
                                        // input.setAttribute("value", "1");
                                        // //append to form element that you want .
                                        // document.getElementById("form").appendChild(input);

                                        createCookie("gfg", "1", "1");
                                        alert("Congratulation your output is Correct");
                                        // console.log(compileoutput);
                                    } else {
                                        status = 0;

                                        // setcookie("gfg", "0", time() + (86400 * 30), "/");
                                        // setcookie("gfg", "0", time() + 3600);
                                        // ?>
                                        // var input = document.createElement("input");
                                        // input.setAttribute("type", "hidden");
                                        // input.setAttribute("id", "hide");
                                        // input.setAttribute("name", "status_");
                                        // input.setAttribute("value", "0");
                                        // //append to form element that you want .
                                        // document.getElementById("form").appendChild(input);

                                        createCookie("gfg", "0", "1");
                                        console.log("compiled output is not correct");
                                        alert("Sorry Your output is INCORRECT");
                                    }

                                    console.log("user " + user + "title" + title + "status" + status);
                                }

                            };
                            xmlhttp.open("GET", file, true);
                            xmlhttp.send();

                            function createCookie(name, value, days) {
                                var expires;

                                if (days) {
                                    var date = new Date();
                                    date.setTime(date.getTime() + (days * 24 * 60 * 1000));
                                    expires = "; expires=" + date.toGMTString();
                                } else {
                                    expires = "";
                                }
                                document.cookie = escape(name) + "=" +
                                    escape(value) + expires + "; path=/";
                            }
                            // header("Location:login.php");

                            // var d = "echo addData($usernamee, $problemTitle); ?>"
                            // console.log(d);
                        }
                    </script>
                    <?php
                    echo "hello dipak";
                    echo $_COOKIE['gfg'];
                    // echo $_REQUEST['status_'];
                    // echo isset($_POST['status_']);

                    function addData($usernamee, $title)
                    {
                        // $_SESSION['status'] = "<script>console.log(status);</script>";
                        // $statuss = $_COOKIE['gfg'];
                        // $_SESSION['status'] = "12";
                        echo " inside hello dipak";
                        echo $_COOKIE['gfg'];
                        // echo isset($_POST['status_']);

                        if (isset($_COOKIE['gfg']))
                            $_statuss = $_COOKIE['gfg'];
                        else {
                            return;
                        }
                        // echo $user;
                        // echo $title;
                        // echo $statuss;
                        // echo "<script>console.log('inside adddata function')</script>";
                        require_once('config.php');

                        // $username = $_POST['uname'];
                        // $pass = $_POST['password'];
                        // //$pass=md5($pass);
                        // $email = $_POST['email'];
                        // $status = $_POST['status'];

                        $sql = "insert into submission(user,title,date,status) values('$usernamee','$title',NOW(),'$_statuss')";

                        $result = $connection->query($sql);
                        if ($result) {
                            $p = 1;
                            echo "Inserted data";
                        } else echo "Data Not inserted";

                        // unset($_SESSION['status']);
                    }
                    if ($p == 1)
                        header("Location:archive.php");
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script>
    var element = document.getElementById('hide');
    if (typeof(element) != 'undefined' && element != null) {
        document.getElementById('hide').remove();
    }
</script> -->

</html>