<?php
session_start();

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid Filename";
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['usernamesession'];
if( !preg_match('/^[\w_\-]+$/', $username)){
	echo "Invalid username";
	exit;
}
// gets path to file in directory
$full_path = sprintf("/home/nredpath/%s/%s", $username, $filename);

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($full_path);
header("Content-Type: ".$mime);
header('content-disposition: inline; filename="'.$filename.'";');
readfile($full_path);

// notifies if file is successfully uploaded or not
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path)){
	header("Location: uploadsuccess.html");
	exit;
}else{
	header("Location: uploadfailure.html");
    exit;
}

?>
