<?php 
include "partials/_header.php";
include "../database/connecton.php";
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat datang, <?php echo $_SESSION['name']; ?>.</h1>
</div>
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Inbox
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $nRows = $con->query('select count(*) from kontak')->fetchColumn(); 
                                                echo $nRows;
                                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            user
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $nRows = $con->query('select count(*) from accounts')->fetchColumn(); 
                                                echo $nRows;
                                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "partials/_footer.php"; ?>