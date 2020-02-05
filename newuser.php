<?php

$newuser = $_POST['newuser']; 
$userholder = "/srv/users.txt"; 
// opens text file containing users
$userfile = fopen($userholder, 'a') or die("Cannot Create User"); 
// writes in the new user
fwrite($userfile, "\n"); 
fwrite($userfile, $newuser);
fclose($userfile); 

// makes a new directory for that user
$newdir = sprintf("/home/nredpath/%s/", $newuser);
mkdir($newdir, 0777); 
echo "creating user..."; 
header("Refresh:2; url='home.html'");
?>

