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
                        <h3><b>Description:</b></h3>
                        <h4 style="font-size: 200px;">
                            <?php
                            $filepath = "problem_statement/$row[descfile]";

                            // Putting description on webpage
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

                    <div style="float:right">
                        <?php
                        echo "<label style=\"padding-left:30px; font-size:17px ;\" >Difficulty level: $row[Difficulty]</label><br>";
                        echo "<label style=\"padding-left:30px; font-size:18px ;\" >Max Score: $row[score]</label>";
                        ?>
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
                        <label for="myCheck">Custom TestCase:</label>
                        <input type="checkbox" id="myCheck" onclick="myFunction()">
                        <!-- <textarea id="text" ></textarea> -->

                        <script>
                            function myFunction() {
                                var checkBox = document.getElementById("myCheck");
                                var text = document.getElementById("text");
                                if (checkBox.checked == true) {
                                    text.style.display = "block";
                                    text.name = "input";
                                    document.getElementById("inputdata").name = "input1";
                                } else {
                                    text.style.display = "none";
                                    text.name = "input1";
                                    document.getElementById("inputdata").name = "input";
                                }
                            }
                            var k = document.getElementById("myCheck").style.display;
                            if (k == "none") {
                                document.getElementById("text").name = "input1";
                                document.getElementById("inputdata").name = "input";
                            }
                        </script>

                        <textarea id="text" class="form-control" style="display:none" name="input1" rows="10" cols="50"></textarea>
                        <input type="hidden" id="inputdata" name="input" value=" 
                            <?php
                            // $filepathinput = "inputs/111.txt";
                            $filepathinput = "test_input_cases/$row[inputfile]";

                            // Putting  file
                            if ($fh = fopen("$filepathinput", 'r')) {
                                while (!feof($fh)) {
                                    $line = fgets($fh);
                                    echo $line;
                                    // echo "<br>";
                                }
                                fclose($fh);
                            }
                            ?>">
                        <input type="hidden" id="answer" name="input3" value=" 
                            <?php
                            // $filepathinput = "inputs/111.txt";
                            // $filepathinput = "test_input_cases/$row[inputfile]";

                            // Putting  file
                            if ($fh = fopen("$Answerfilepath", 'r')) {
                                while (!feof($fh)) {
                                    $line = fgets($fh);
                                    echo $line;
                                    // echo "<br>";
                                }
                                fclose($fh);
                            }
                            ?>"><br><br>

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
                        <input type="hidden" name="score" value="<?php echo $row['score']; ?>">
                        <input type="submit" onclick="afterSubmitting()" value="Submit Code">
                        <br><br><br>
                    </form>
                    <script>
                        var user = "<?php echo ($usernamee) ?>";
                        var title = "<?php echo ($problemTitle) ?>";
                        var file = "<?php echo ($Answerfilepath); ?>";
                        var maxScore = "<?php echo ($row['score']); ?>";
                        console.log("answer path - " + file);
                        // console.log("answer path - "+file);
                        var status;

                        function afterSubmitting() {
                            if (status == 1)
                                alert('Your response has been submitted \r\n\r\nYou Earn a ' + maxScore + ' points')
                            else
                                alert('Your response has been submitted \r\n\r\nYou Lose a ' + maxScore + ' points')

                        }

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
                                    console.log(this.responseText);
                                    output += this.responseText.trim();
                                    // var compileoutput = "";
                                    var compileoutput = document.getElementById('div').value.trim();
                                    if (output.localeCompare(compileoutput) == 0) {
                                        console.log("Compiled output is correct");
                                        status = 1;

                                        createCookie("gfg", "1", "1");
                                        alert("Congratulation your output is CORRECT");
                                        // console.log(compileoutput);
                                    } else {
                                        status = 0;

                                        createCookie("gfg", "0", "1");
                                        console.log("compiled output is not correct");
                                        alert("Sorry Your output is INCORRECT \r\n Retry it!!!!!");
                                    }
                                    console.log("output- ");
                                    console.log(output);
                                    console.log("user- " + user + " title- " + title + "  status-" + status);
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

                        }
                    </script>


                </div>
            </div>
        </div>
    </div>
</body>

</html>