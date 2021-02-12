<?php include "partials/_header.php"; ?>
<?php
include "../database/connecton.php";

$query = "SELECT * FROM accounts ORDER BY id DESC";

$stmt = $con->prepare($query);
$stmt->execute();
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Accounts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
						<th>No</th>
                        <th>Name</th>
                        <th>username</th>
                        <th>Email</th>
						<th>NO. HP</th>
                        <th>Gender</th>
                        <th>Birth date</th>
                        <th>Level</th>
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
                        <td><?php echo $name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
						<td><?php echo $nomor; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td><?php echo $birthdate; ?></td>
                        <td><?php echo $level; ?></td>
                    </tr>

                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "partials/_footer.php"; ?>