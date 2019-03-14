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
                <h3>Book Management System</h3>
            </div>
            <div class="row">
				<p>
                    <a href="add.php" class="btn btn-success">Add New Book</a>
					<a href="list.php" class="btn btn-success">Search Book</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Book ID</th>
                      <th>Title</th>
                      <th>Price</th>
					  <th>Publisher</th>
					  <th>Year Published</th>
					  <th>Image Of Book</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
								require_once('database.php');
								$result = $conn->prepare("SELECT * FROM book ORDER BY id ASC");
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
								<?php 
								echo '<td width=250>';
								echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>'; 
								echo '</td>';
								?>
								<?php } ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>