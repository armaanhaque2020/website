
<?php 

include_once 'functions.php';
include_once 'database.php';



 ?>







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->

            <a class="btn btn-primary" href="../index.php">Shop</a>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="products.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Products</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Product List 

                            <form style="float: right;"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                <input class="" type="text" name="search">
                                <input class="" type="submit" name="searche-btn" value="search">
                                
                            </form>


                        </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Procuct Name</th>
                                                <th>Regular Price</th>
                                                <th>Sell Price</th>
                                                <th>Category</th>
                                                <th>Tag</th>
                                                <th>Brand</th>
                                                <th>Product Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Procuct Name</th>
                                                <th>Regular Price</th>
                                                <th>Sell Price</th>
                                                <th>Category</th>
                                                <th>Tag</th>
                                                <th>Brand</th>
                                                <th>Product Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody> 





<?php 

 $search = '';
 if (isset($_POST['searche-btn'])) {
   $search = $_POST['search'];
 }



 $sql = "SELECT * FROM tbl_product  WHERE tag ='$search' OR pname LIKE '%$search%' ORDER BY rprice DESC";
 $query = mysqli_query($conn,$sql);
 $check_query = mysqli_num_rows($query);


 if ($check_query > 0) {
      while ($row = mysqli_fetch_assoc($query)) {


        ?>


                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['pname']; ?></td>
                                                <td><?php echo $row['rprice']; ?></td>
                                                <td><?php echo $row['sprice']; ?></td>
                                                <td><?php echo $row['category']; ?></td>
                                                <td><?php echo $row['tag']; ?></td>
                                                <td><?php echo $row['brand']; ?></td>
                                                <td><?php echo '<img style="width: 50px;" src="img/'.$row['pimg'].'">'; ?> </td>
                                                <td><a  href="updpro.php?id=<?php echo $row['id'];?>">Edit</a>||


                                                    <a id="del_btn" class="btn btn-primary">Delete</a>


                                                    

                                                </td>
                                            </tr>


          
      <?php


  }
  } 








 ?>



                                        </tbody>


                                        <?php 
                                           if (isset($msg)) {
                                               echo $msg;
                                           }

                                         ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

  
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="jsmin.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
              <script>
            

                        $('a#del_btn').click(function(){

              let con = alert('are you sure to delete it');

              if (con == true) {
                return true;
              }else{
                return false;
              }


            });


        </script>
    </body>
</html>
