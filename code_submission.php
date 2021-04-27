<?php

require_once('config.php');

$username = $_POST['user_name'];
$problemTitle = $_POST['problem_title'];

if (isset($_COOKIE['gfg']))
    $_statuss = $_COOKIE['gfg'];
else {
    return;
}
echo "Code Submitted successfuly";
echo $username;
echo $problemTitle;
echo $_statuss;

$sql = "insert into submission(user,title,date,status) values('$usernamee','$title',NOW(),'$_statuss')";

$result = $connection->query($sql);

if ($result) {
    // header("Location:archive.php");
} else {
    echo "Failed<br>";
}
