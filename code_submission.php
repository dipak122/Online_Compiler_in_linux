<?php

require_once('config.php');

$username = $_POST['user_name'];
$problemTitle = $_POST['problem_title'];

if (isset($_COOKIE['gfg']))
    $_statuss = $_COOKIE['gfg'];
else {
    return;
}
$sql = "insert into submission(user,title,date,status) values('$username','$problemTitle',NOW(),'$_statuss')";

$result = $connection->query($sql);

if ($result) {

    // echo "Code Submitted successfuly";
    // echo $username;
    // echo $problemTitle;
    // echo $_statuss;
    // echo "<script>alert('code submitted');</script>";
    // header("Location:challenges.php?user=$usernamee/$problemTitle\");
    header("Location:archive.php");
} else {
    echo "Submission data not inserted <br>";
}
