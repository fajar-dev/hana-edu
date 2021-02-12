<?php include "partials/_header.php"; ?>
<?php
include "../database/connecton.php";

$query = "SELECT * FROM kontak ORDER BY id DESC";

$stmt = $con->prepare($query);
$stmt->execute();
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
					    <th>NO</th>
						<th>Tanggal</th>
                        <th>Name</th>
                        <th>subject</th>
                        <th>message</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					$no=1;
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row):
                        extract($row);
                    ?>

                    <tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tanggal; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $subjek; ?></td>
                        <td><?php echo $pesan; ?></td>
						<td><a href="./partials/hapus.php?id=<?php echo $id; ?>" class="btn btn-danger btn-icon-split btn-del">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">hapus</span>
                            </a>
						</td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "partials/_footer.php"; ?>