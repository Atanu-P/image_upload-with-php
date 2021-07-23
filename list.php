<?php
    require_once "db.php";
?>

<html>
    <head> 
        <title>Image List</title>
    </head>
    <body> 
        
        <h2 align="center">List of Image</h2>  

        <ul style="list-style-type:none;">
            <li><a href="upload.php">Upload Image</a></li>    
        </ul>
        <hr>  

        <table border="1px" cellpadding="10px" cellspacing="0px" align="center">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Size</th>
                <th>Preview</th>
                <th>Delete</th>
                
            </tr>
<?php 
        $select = "select * from image";

        $query = mysqli_query($con, $select);


        
        while($fetch = mysqli_fetch_array($query)){
?>

            <tr>
                <td><?= $fetch['name'] ?></td>
                <td><?= $fetch['type'] ?></td>
                <td><?= round($fetch['size']/ 1024, 1) ?> kb</td>
                <td><a href="preview.php?id=<?= $fetch['id'] ?>" target="_blank">Preview</a></td>
                <td><a href="delete.php?id=<?= $fetch['id'] ?>" onclick="if(confirm('Are you sure you want to delete this image ?')) return true; else return false;">Delete</a></td>
            </tr>
<?php
        }
?>

        </table>
<?php
       // echo "<img src='images/Login.png' width='750' height='400'>";
 ?>       
</body>
</html>
