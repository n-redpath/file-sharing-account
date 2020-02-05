<html>
<head>
<title> User Page   </title>
</head>

<h1>Upload File</h1>

<p>Choose a file to upload. Please make sure there are no spaces or special characters in your file name</p> 

<!-- upload file button  -->
<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
        <label for="uploadfile_input">Choose a file to upload:</label> 
        <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>

<form align="right" name="form1" method="post" action="logout.php">
  <label>
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
<br><br>
 
</form>
<body>
</body>
</html>  



<?php
session_start();
$username = $_SESSION['usernamesession'];

// start session for uploaded file 
$filename = $_GET['file'];
$_SESSION['filenamesession'] == $filename; 

$dir = sprintf("/home/nredpath/%s", $username);

// get path to user directory
$full_path = sprintf("/home/nredpath/%s", $username);
$dir = scandir($full_path); 

// print file name and delete and view button for each file
foreach($dir as $value){
    if ($value != ".." && $value != "."){
    echo "
    <form action='delete.php' method='POST'> 
    <span>$value</span>
    <br>
    <input type='hidden' name='select' value='$value'/>
    <input type='submit' value ='delete'/>
    </form>
    ";
    echo "
    <form action='view.php' method='POST'> 
    <input type='hidden' name='select' value='$value'/>
    <input type='submit' value ='view'/>
    </form>
    ";
    }
}


?>