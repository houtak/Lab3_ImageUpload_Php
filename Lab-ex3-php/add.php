<?php

require_once ('database.php');

if (isset($_POST['Submit'])) {
// echo "";
// }else{
// $file=$_FILES['image']['tmp_name'];
// $image = $_FILES["image"] ["name"];
// $image_name= addslashes($_FILES['image']['name']);
// $size = $_FILES["image"] ["size"];
// $error = $_FILES["image"] ["error"];
// 
// if ($error > 0){
// die("Error uploading file! Code $error.");
// }else{
// 	if($size > 10000000) //conditions for the file
// 	{
// 	die("Format is not allowed or file size is too big!");
// 	}
// 	
// else
// 	{
move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
$location=$_FILES["image"]["name"];
$title=$_POST['title'];
$price=$_POST['price'];
$publisher=$_POST['publisher'];
$yearpublished=$_POST['yearpublished'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO book (title, price, publisher, yearpublished, booklocation)
VALUES ('$title', '$price', '$publisher', '$yearpublished', '$location')";

$conn->exec($sql);
echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
// }
}
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <form method="post" action="add.php"  enctype="multipart/form-data">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Title</label></td>
		<td width="30"></td>
		<td><input type="text" name="title" placeholder="title" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Price</label></td>
		<td width="30"></td>
		<td><input type="number" step="0.01" name="price" placeholder="price" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Publisher</label></td>
		<td width="30"></td>
		<td><input type="text" name="publisher" placeholder="publisher" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Year Published</label></td>
		<td width="30"></td>
		<td><input type="number" name="yearpublished" placeholder="yearpublished" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Select your Image</label></td>
		<td width="30"></td>
		<td><input type="file" name="image"></td>
	</tr>
</table>
    </div>
    <div>
     <a class="btn" href="index.php" class="btn btn-primary">Back</a>
<button type="submit" name="Submit" class="btn btn-primary">Add</button>
    </div>
</form>
  </body>
</html>