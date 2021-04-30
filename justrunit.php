<?php


echo "hello i m groot!!";
$filename = "echo kali | sudo -S chmod 777 *.* ";
// $filename = "chmod 777 *.*";
// $filename = "echo hello";

echo $filename . shell_exec($filename);
