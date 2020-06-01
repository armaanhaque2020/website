
<?php 


include_once 'functions.php';
include_once 'database.php';
   

$id = $_GET['id'];
$pname  = $_POST['pname'];



     $sql     = "UPDATE tbl_product SET  pname = '$pname' WHERE id = $id";
     $result  = mysqli_query($conn,$sql);

     if ($result) {
     	header("Location:products.php?id=".$id);
     }else{
     	echo "failed";
     }

 








  

//inserting Product Data












 ?>



