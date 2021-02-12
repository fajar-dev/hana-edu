<!-- Modal contact -->
<div class="modal fade bd-example-modal-lg" id="mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body pt-5 pb-5">
                                    <?php if(!isset($_SESSION['level'])): ?>
                                        <div class="text-center">
                                            <h2 class="p-5 text-center"> Maaf !! <br>Kamu harus login terlebih dahulu</h2>
                                            <button class="btn btn-primary" data-dismiss="modal">OK</button>
                                        </div>
                                    <?php else: ?>
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <h2 class="mb-4">Contact Us</h2>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subjek" id="subjek" placeholder="subject" required>
                                    </div>
                                    <div class="form-group">
                                        <pre><textarea class="form-control" name="pesan" id="pesan" style="white-space: pre-line;" placeholder="Type your message" row="5" required></textarea></pre>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary" value="submit">Kirim</button>
                                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <?php endif;?>
                                </form>                    
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])) {
                                $nama = $_SESSION['name'];
                                $subjek = $_POST['subjek'];
                                $pesan = $_POST['pesan'];
                                $tanggal = date("Y-m-d H:i:s");
                                        try {
                                            $query = "INSERT INTO kontak SET 
                                                    tanggal=:tanggal,
                                                    nama=:nama, 
                                                    subjek=:subjek, 
                                                    pesan=:pesan";
                                            
                                            $stmt = $con->prepare($query);
            
                                            $stmt->bindParam(':tanggal', $tanggal);
                                            $stmt->bindParam(':nama', $nama);
                                            $stmt->bindParam(':subjek', $subjek);
                                            $stmt->bindParam(':pesan', $pesan);
            
                                            if($stmt->execute()) {
                                                echo "<script>location.replace('?sukses');</script>";
                                            }
                                            else {
                                                echo "<script>location.replace('?gagal');</script>";
                                            }
            
                                        }
                                        catch(PDOException $e) {
                                            die('Error: ' . $e->getMessage());
                                        }
                                
                            }
                            ?>