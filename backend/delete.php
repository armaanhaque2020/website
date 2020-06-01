

<?php 

include_once 'functions.php';
include_once 'database.php';



 ?>



<?php 

if (isset($_GET['id'])) {
    $userid = $_GET['id'];
}


$delq     = "DELETE FROM tbl_product WHERE id = '$userid'";
$querydel = mysqli_query($conn,$delq);
if ($querydel) {
   echo $msg = "Product Deleted";
}



 ?>