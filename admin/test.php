<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php 
//This is the directory where images will be saved 
$target = "your directory"; 
$target = $target . basename( $_FILES['photo']['name']); 
//This gets all the other information from the form 
$name=$_POST['nameMember']; 
$bandMember=$_POST['bandMember']; 
$pic=($_FILES['photo']['name']); 
$about=$_POST['aboutMember']; 
$bands=$_POST['otherBands']; 
// Connects to your Database
mysql_connect("yourhost", "username", "password") or die(mysql_error()) ; 
mysql_select_db("dbName") or die(mysql_error()) ; 
//Writes the information to the database 
mysql_query("INSERT INTO tableName (nameMember,bandMember,photo,aboutMember,otherBands) VALUES ('$name', '$bandMember', '$pic', '$about', '$bands')") ;
//Writes the photo to the server 
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
	{ 
	//Tells you if its all ok 
		echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; }
		 else 
		 	{ //Gives and error if its not 
		 		echo "Sorry, there was a problem uploading your file."; } 
		 		?>


		 		
	<form method="post" action="addMember.php" enctype="multipart/form-data"> 
	<p> Please Enter the Band Members Name. </p>
	<p> Band Member or Affiliates Name: </p> 
	<input type="text" name="nameMember"/> 
	<p> Please Enter the Band Members Position. Example:Drums. </p> 
	<p> Band Position: </p> <input type="text" name="bandMember"/> 
	<p> Please Upload a Photo of the Member in gif or jpeg format. The file name should be named after the Members name. If the same file name is uploaded twice it will be overwritten! Maxium size of File is 35kb. </p> 
	<p> Photo: </p> 
	<input type="hidden" name="size" value="350000"> 
	<input type="file" name="photo"> 
	<p> Please Enter any other information about the band member here. </p> 
	<p> Other Member Information: </p> 
	<textarea rows="10" cols="35" name="aboutMember"> </textarea> 
	<p> Please Enter any other Bands the Member has been in.</p> 
	<p> Other Bands: </p> <input type="text" name="otherBands" size=30 /> <br/> <br/> 
	<input TYPE="submit" name="upload" title="Add data to the Database" value="Add Member"/> 
	</form>
</body>
</html>