<?php
session_start();
$username = $_SESSION['usernamesession'];
// gets selected file 
$selected = $_POST["select"]; 
$full_path = "/home/nredpath/$username/$selected";
// uses unlink to delete the selected file 
if(unlink($full_path)){
    header("Refresh:2; url='user.php'");
    echo "File Deleted!";
}

?>
