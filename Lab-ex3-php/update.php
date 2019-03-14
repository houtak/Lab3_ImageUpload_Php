<?php

require_once ('database.php');

$id = null;
$oldtitle = null;
$oldprice = null;
$oldpublisher = null;
$oldyearpublished = null;


    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$result = $conn->prepare("SELECT * FROM book WHERE id = '$id'");
	    $result->execute();
		$data = $result->fetch(PDO::FETCH_ASSOC);
		$oldtitle = $data['title'];
		$oldprice = $data['price'];
		$oldpublisher = $data['publisher'];
		$oldyearpublished = $data['yearpublished'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }

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
	if ($_FILES["image"]["size"] == 0 ){
		$title=$_POST['title'];
		$price=$_POST['price'];
		$publisher=$_POST['publisher'];
		$yearpublished=$_POST['yearpublished'];

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE book set title = '$title', price = '$price', publisher = '$publisher', yearpublished = '$yearpublished' WHERE id = '$id'";

		$conn->exec($sql);
		echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
	
	}else{
		
		move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
		$location=$_FILES["image"]["name"];
		$title=$_POST['title'];
		$price=$_POST['price'];
		$publisher=$_POST['publisher'];
		$yearpublished=$_POST['yearpublished'];

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE book set title = '$title', price = '$price', publisher = '$publisher', yearpublished = '$yearpublished', booklocation = '$location' WHERE id = '$id'";

		$conn->exec($sql);
		echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
    
	}
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
    <form method="post" action="update.php?id=<?php echo $id?>"  enctype="multipart/form-data">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Title</label></td>
		<td width="30"></td>
		<td><input type="text" name="title" placeholder="title" value = "<?php echo $oldtitle ?>" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Price</label></td>
		<td width="30"></td>
		<td><input type="number" step="0.01" name="price" placeholder="price" value = "<?php echo $oldprice ?>" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Publisher</label></td>
		<td width="30"></td>
		<td><input type="text" name="publisher" placeholder="publisher" value = "<?php echo $oldpublisher ?>"/></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Year Published</label></td>
		<td width="30"></td>
		<td><input type="number" name="yearpublished" placeholder="yearpublished" value = "<?php echo $oldyearpublished ?>"/></td>
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
<button type="submit" name="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
  </body>
</html>