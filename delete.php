<?php

    require_once "db.php";
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){

    	$id = $_GET['id'];

    	$select = "select * from image where id=$id";

    	$query = mysqli_query($con, $select);

	   	$fetch = mysqli_fetch_array($query);
    	

   		 if(unlink("images/".$fetch['name'])){
			

   		 	$delete = "delete from image where id=$id";

	   		 $query = mysqli_query($con, $delete);

			if($query == 1){
				header('location:list.php');
			}
		}

    	echo $id;
    }

?>