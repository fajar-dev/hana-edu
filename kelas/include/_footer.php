                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card lain">
                                <div class="card-body">
                                    <h4>kelas lainnya</h4>
                                    <ul>
                                        <a href="hiragana.php"><li>Hiragana</li></a>
                                        <a href="katakana.php"><li>Katakana</li></a>
                                        <a href="kanji.php"><li>Kanji</li></a>
                                        <a href="partikel.php"><li>Partikel</li></a>
                                        <a href="ungkapan.php"><li>Ungkapan</li></a>
                                        <a href="bahasa.php"><li>Tata Bahasa</li></a>
                                        <a href="kotowaza.php"><li>Kotowaza</li></a>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card lain">
                                <div class="card-body">
                                    <h4>Perlu Bantuan ?</h4>
                                    <button type="button" data-toggle="modal" data-target="#mail" class="btn btn-primary btn-block tombol mt-3"> Contact Us </button>
                                </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>      
        <!--------footer---------->
        <section id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-muted p-5">Fajar-Dev © 2020. All Rights Reserved.</h6>
                    </div>    
                </div>
            </div>
        </section>

        <?php include "./include/kontak.php"; ?>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="../js/costum.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <?php
        if(isset($_GET['sukses'])){
            echo "<script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Pesan Terkirim',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
        }else if(isset($_GET['gagal'])){
            echo "<script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Pesan Gagal Dikirim',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
        }   
    ?>
    </body>
</html>