<?php
include "../../database/connecton.php";
 
try{
$sql = "DELETE FROM kontak WHERE id = '$_GET[id]' ";
 
// use exec() because no results are returned
$con->exec($sql);
header('Location: ../contact.php?sukses');
}
catch(PDOException $e){
echo $sql . "<br>" . $e->getMessage();
}
$con = null;
?>