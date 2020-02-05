<?php
session_start();
// destroys session and directs to home page
echo "Logged Out!";
session_destroy();
header("Refresh:2; url='home.html'");
exit;
?>