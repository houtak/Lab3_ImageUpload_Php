<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Search Book</h3>
            </div>
            <div class="row">
				<form>
						<h4>Find book based on Price</h4>
						MIN : <input type="number" name="min" placeholder="Min" >
						MAX : <input type="number" name="max" placeholder="Max">
					   <button type="submit" name="submit" value="submit" class="btn btn-success">Search</button>
			    
                </form>
				<form>
						<h4>Find book based on Year</h4>
						Year : <input type="number" name="year" placeholder="year" >
					   <button type="submit" name="submit2" value="submit2" class="btn btn-success">Search</button>
			    
                </form>
				<form>
						<h4>Find book based on Publisher</h4>
						Publisher Name : <input type="text" name="publisher" placeholder="publisher" >
					   <button type="submit" name="submit3" value="submit3" class="btn btn-success">Search</button>
			    
                </form>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Book ID</th>
                      <th>Title</th>
                      <th>Price</th>
					  <th>Publisher</th>
					  <th>Year Published</th>
					  <th>Image Of Book</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
							if (isset($_GET['submit'])){
								
								$result1=$_GET['min'];
								$result2=$_GET['max'];
								
								require_once('database.php');
								
								$result = $conn->prepare("SELECT * FROM book WHERE price BETWEEN '$result1' AND '$result2' ORDER BY id ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['id']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['title']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['price']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['publisher']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['yearpublished']; ?></td>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['booklocation'] != ""): ?>
									<img src="uploads/<?php echo $row['booklocation']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								<?php } ?>
							<?php } ?>
							
							
							
							<?php
							if (isset($_GET['submit2'])){
										
								$result3=$_GET['year'];
								
								require_once('database.php');
								
								$result = $conn->prepare("SELECT * FROM book WHERE yearpublished = '$result3' ORDER BY id ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['id']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['title']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['price']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['publisher']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['yearpublished']; ?></td>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['booklocation'] != ""): ?>
									<img src="uploads/<?php echo $row['booklocation']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								<?php } ?>
							<?php } ?>
							
							<?php
							if (isset($_GET['submit3'])){
										
								$result4=$_GET['publisher'];
								
								//echo $result4;
								
								require_once('database.php');
								
								$result = $conn->prepare("SELECT * FROM book WHERE publisher = '$result4' ORDER BY id ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['id']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['title']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['price']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['publisher']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['yearpublished']; ?></td>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['booklocation'] != ""): ?>
									<img src="uploads/<?php echo $row['booklocation']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								<?php } ?>
							<?php } ?>
							
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>