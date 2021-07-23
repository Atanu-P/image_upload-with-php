<?php
    require_once "db.php";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

    	$id = $_GET['id'];
    	//echo $id;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Preview</title>
</head>
<body>
<div align="center">
<?php

	$select = "select * from image where id=$id";

    $query = mysqli_query($con, $select);


        
        while($fetch = mysqli_fetch_array($query)){

        $image = $fetch['name'];
?>

        <h2><?= $image ?></h2><hr>

<?php
        	//echo $image;
       		echo "<img src='images/$image' width='1280' height='720'>";
    	}
?>
</div>
</body>
</html>