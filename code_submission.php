<?php

require_once('config.php');


// $fileinput = "multiple_input_case/input.txt";
// $fileoutput = "multiple_output_case/output.txt";
// echo $fileinput . "<h1>Trying</h1>";
// $code = $_POST["code"];
// echo $code;

// // echo fopen("$fileinput", 'r');
// // echo fopen("$fileoutput", 'r');
// if (($fh1 = fopen("$fileinput", 'r')) && ($fh2 = fopen("$fileoutput", 'r'))) {
//     // $in = "";
//     while (!feof($fh1) && !feof($fh2)) {
//         $in = fgets($fh1);
//         // echo $in;
//         $out = fgets($fh2);
//         // echo $out;

//         $testcase_input = "test_input_cases/" . $in;
//         echo "<br>";
//         $testcase_output = "test_cases/" . $out;
//         // $inputcontent = "";
//         // echo "<h1>after file path ...</h1>";

//         trim($testcase_input);
//         trim($testcase_output);
//         echo $testcase_input;
//         echo $testcase_output;

//         // echo fopen("$testcase_input", 'r');
//         echo "<h1>before file path ...</h1>";
//         $testcase_input = "test_input_cases/11.txt";
//         if ($inputfile = fopen("$testcase_input", 'r')) {
//             while (!feof($inputfile)) {
//                 $inputcontent = fgets($inputfile);
//                 echo $inputcontent;
//             }
//         } else {
//             echo "<h2>Not enter into file</h2>";
//         }
//         fclose($inputfile);
//         echo "<h1>content input ...........</h1>";
//         // echo $inputcontent . "<br>";

//         // echo "<h1>after file path ...</h1>";

//         // echo $inputcontent;
//         // echo "<br>";
//     }
//     fclose($fh1);

//     fclose($fh2);
//     // echo "<h1>after second File input ...........</h1>";

//     // echo $in . "<br>";
//     // echo $out;
// } else {
//     echo "<h1>not done</h1>";
// }
// echo "<h1>last Line</h1>";

$username = $_POST['user_name'];
$problemTitle = $_POST['problem_title'];
$score = $_POST['score'];
if (isset($_COOKIE['gfg']))
    $_statuss = $_COOKIE['gfg'];
else {
    return;
}
$sql = "insert into submission(user,title,date,status) values('$username','$problemTitle',NOW(),'$_statuss')";
if ($_statuss == "1") {
    $updatesql = "update user set score=score+'$score' where name='$username'";
    // echo "<script>alert(\"You have won $_COOKIE['gfg']\")</script>";
} else {
    $updatesql = "update user set score=score-'$score' where name='$username'";
}

$result = $connection->query($sql);
$result1 = $connection->query($updatesql);
header("Location:archive.php");

// if ($result) {

//     // echo "Code Submitted successfuly";
//     // echo $username;
//     // echo $problemTitle;
//     // echo $_statuss;
//     // echo "<script>alert('code submitted');</script>";
//     // header("Location:challenges.php?user=$usernamee/$problemTitle\");
//     header("Location:archive.php");
// } else {
//     echo "Submission data not inserted <br>";
// }
