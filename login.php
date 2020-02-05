<?php
$username = $_GET['usernameInput'];
session_start(); 

// opens text file containing users
$h = fopen("/srv/users.txt", "r"); 
echo "<ul>\n"; 
$isUser = false; 
// checks if user is in the file
while( !feof($h) ){
  $temp = trim(fgets($h));
  if ($username == $temp){
    echo "if";
    $isUser = TRUE;    
}
}
fclose($h);
// logs in if true, prints if false.
if ($isUser == TRUE){
  $_SESSION['usernamesession'] = $username;
	echo $_SESSION['usernamesession'];  
      header("Location: user.php");
      exit;
}
else {
  printf("Invalid Username");
}



?>

