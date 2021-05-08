<?php


echo "hello i m groot!!";
// $filename = "echo kali | sudo -S chmod 777 *.* ";
$command = "chmod +x hello132.txt";
// $filename = "echo hello";
// system
if (function_exists('system')) {
    ob_start();
    system($command, $return_var);
    $output = ob_get_contents();
    ob_end_clean();
}else{
    echo "not exits system";
}
