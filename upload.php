<?php
	require_once "db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
    	$name = $_FILES['image']['name'];      			 
		$type = $_FILES['image']['type'];      			
		$temp = $_FILES['image']['tmp_name'];
		$size = $_FILES['image']['size'];
		$location = "images/".$name;

		//echo $name;

		$check = 1;

		# limit image type
		if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png'){
			$check = 1;
		} else {
			echo "<script>alert('Only JPG, JPEG, PNG files are allowed !!')</script>";
			$check = 0;
		}



		if(file_exists($location)){
			echo "<script>alert('Image file already exists !!')</script>";
			$check = 0;
		
		}else if ($size > 1000000) {
			echo "<script>alert('Sorry, your image size is more than 1mb !!')</script>";
			$check = 0;
		}




		if($check == 1){

			if(move_uploaded_file($temp, $location)){
				echo "<br><h2 style='color:green;'>The file ". htmlspecialchars( basename( $name)). " has been uploaded.</h2><hr>";

				$insert = "insert into image values('','$name','$type','$size')";
				mysqli_query($con, $insert);
			}

		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
</head>
<body>

	<ul style="list-style-type:none;">
            <li><a href="list.php">List of Images</a></li>    
    </ul>
    	<hr>

	<form action="#" method="POST" enctype="multipart/form-data">
		Upload Image:
		<input type="file" name="image" required="">
		<button type="submit">Upload</button>
	</form>

</body>
</html>