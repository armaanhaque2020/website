
<?php 
ob_start();

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
        <title>Dashboard - SB Admin</title>
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

            <button class="success"><a href="../index.php">Shop</a></button>
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
              

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
         
                            </div>
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





<!--- 

       <input class="form-control py-4" id="inputConfirmPassword" name="category" type="text" placeholder="Category" />

-->






<?php 

    //product adding 




    if (isset($_POST['addproduct'])) {
        $pname    = $_POST['pname'];
        $rprice   = $_POST['rprice'];
        $sprice   = $_POST['sprice'];
        $category = $_POST['category'];
        $tag      = $_POST['tag'];
        $brand    = $_POST['brand'];
        $pdescri  = $_POST['pdescri'];


        //file upload function 




        if (empty($pname)||empty($rprice)||empty($sprice)||empty($category)||empty($tag)||empty($brand)||empty($pdescri)||empty($_FILES['pimg']['tmp_name'])) {
           $msg = "Fields must not be empty";
        } elseif ($sprice > $rprice) {
             $msg = "Sell price can not be bigger than regular price Regular Price";
        }


        else{
          $data = fileUpload($_FILES['pimg'],'img/',['jpg','png'],[


            'type'      => 'image',
            'pname'     => $pname,
            'tag'       => $tag,
            'brand'     => $brand,
            'category'  => $category

        ]);

        echo $data['msg'];



        $proimg_name = $data['file_name'];

        
        $sql  = "INSERT INTO tbl_product(pname,rprice,sprice,category,tag,brand,pdescri,pimg)VALUES('$pname','$rprice','$sprice','$category','$tag','$brand','$pdescri','$proimg_name')";

        $query = mysqli_query($conn,$sql);

        header("Location:products.php");
        ob_end_clean();


        }

//inserting Product Data







    }








 ?>







                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Add Your Product Here</div>
                                    <div class="card-body">
                                        
















<!-- form area -->



<?php 


if (isset($msg)) {
    echo $msg;
}

 ?>

                                      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">প্রডাক্ট নেইম</label><input class="form-control py-4" id="inputFirstName" type="text" name="pname" placeholder="Product Name" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">রেগুলার প্রাইজ</label><input class="form-control py-4" id="inputLastName" name="rprice" type="text" placeholder="Regular Price" /></div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">সেল প্রাইজ</label><input class="form-control py-4" id="inputPassword" type="text" name="sprice" placeholder="Sell Price" /></div>
                                                </div>




                                                <div class="col-md-6">

                                     <div class="form-group" >
                                    <label class="small mb-1" for="inputConfirmPassword">কেটাগরি</label>
                                                                    <select style="width: 100%;
                                                                       height: 50px;
                                                                     border-radius: 5px;" value="def" name="category">
                                                                        <option value="Electronics">Electronics</option>
                                                                        <option value="Daily">Daily</option>
                                                                        <option value="Food">Food</option>


                                                                    </select>
                                                                 
                                                                  </div>












                               
                                                </div>





                                            </div>
                                             <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">টেগ</label><input class="form-control py-4" id="inputFirstName" type="text" name="tag" placeholder="Tags" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">ব্রেন্ড</label><input class="form-control py-4" id="inputLastName" type="text" name="brand" placeholder="Brand" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">প্রডাক্ট ডিসক্রিপসন</label> <textarea class="form-control" rows="3" id="comment" name="pdescri" placeholder="Product description"></textarea></div>
                                                </div>
                                            </div>
                                             <div class="form-group"><label class="small mb-1" for="inputEmailAddress">প্রডাক্ট ইমেজ</label><input class="form-control py-4" id="inputEmailAddress" type="file" name="pimg" aria-describedby="emailHelp" placeholder="Enter email address" /></div>


                                            <div class="form-group mt-4 mb-0">

                                                 <input type="submit" class="btn btn-primary btn-block" value="Add Product" name="addproduct">
                                                </div>
                                        </form>






                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>

        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
