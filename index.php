<?php

ob_start();

session_start();

if(isset($_SESSION['level'])) {
    if($_SESSION['level'] != "user") {
        header('Location: admin/Index.php');
    }
}
include "database/connecton.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Hana Education for submission dicoding">
        <meta name="keywords" content="HTML, CSS, JavaScript, php, hiragana, katakana, kanji, dicoding">
        <meta name="author" content="fajar-dev">
        <link href="./assets/img/logo.png" rel="apple-touch-icon">  
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <!--fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@700&display=swap" rel="stylesheet">
        <!------favicon------>
        <link rel="shortcut icon" href="./assets/img/logo.png">
        <!---------------------------------------->
        <title>Hana Education</title>

        <!---------------------------
        + for submission dicoding +
        ---------------------------->

    </head>
    <body class="bg-custom">
        <!---------navbar----------->
        <section class="nav-navbar fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <h1>はな</h1>
                    </a>
                    <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                <div class="dropdown">
                                    <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelas <i class="fas fa-caret-down" style="font-size: 16px;;"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="./kelas/hiragana.php">Hiragana</a>
                                            <a class="dropdown-item" href="./kelas/katakana.php">Katakana</a>
                                            <a class="dropdown-item" href="./kelas/kanji.php">Kanji</a>
                                            <a class="dropdown-item" href="./kelas/partikel.php">Partikel</a>
                                            <a class="dropdown-item" href="./kelas/ungkapan.php">Ungkapan</a>
                                            <a class="dropdown-item" href="./kelas/bahasa.php">Tata Bahasa</a>
                                            <a class="dropdown-item" href="./kelas/kotowaza.php">Kotowaza</a>
                                        </div>
                                </div>
                                <?php if(!isset($_SESSION['level'])): ?>
                                <a class="nav-item btn btn-primary tombol pl-4 pr-4" href="register.php">DAFTAR</a>
                                <a class="nav-item btn btn-danger tombol pl-4 pr-4" href="login.php">MASUK</a>
                                <?php else: ?>
                                <div class="dropdown">
                                    <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?> <i class="fas fa-caret-down" style="font-size: 16px;;"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                                        </div>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>  
            </nav>
        </section>
        <!------------jumbotron----------->
        <div id="home" class="jumbotron jumbotron-fluid">
            <div class="container sec1 text-center">
                <h1 class="display-4">Hana Japanese Education </h1>
                <p class="display-5">(花日本語教育)</p>
                <?php if(!isset($_SESSION['level'])): ?>
                <a href="register.php" class="btn btn-primary btn-jumbo m-3 pl-5 pr-5">DAFTAR</a>
                <a href="login.php" class="btn btn-danger btn-jumbo m-3 pl-5 pr-5">MASUK</a>
                <?php else: ?>
                <h3 class="display-5">Selamat datang<br><?php echo $_SESSION['name']; ?></h3>
                <?php endif;?>
            </div>
        </div>
        <section id="about" class="about mt-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-5">
                        <img src="assets/img/img1.png" class="img-fluid img1" alt="Responsive image">
                    </div>
                    <div class="col-lg-7">
                        <h2>About Us</h2>
                        <p class="pt-3"><strong>Hana Japanese Education</strong> merupakan platform belajar bahasa jepang secara daring.<br> pengguna dapat registrasi untuk masuk ke dalam kelas online secara gratis, yang dapat diakses kapan saja dan dimana saja.</p>
                        <p>Kami Menyediakan Beberapa kelas dan materi dasar untuk belajar bahasa jepang secara daring. Silahkan login terlebih dahulu bila anda telah memiliki akun untuk mengakses kelas,<br> jika belum memiliki akun, anda dapat registrasi terlebih dahulu pada tombol DAFTAR diatas. </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 text-center p-5">
                        <h2 class="text-center pt-5 mt-4">Perlu Bantuan ?</h2>
                        <button type="button" data-toggle="modal" data-target="#mail" class="btn btn-outline-primary mt-3 p-2 pl-4 pr-4"> Contact Us </button>
                    </div>
                    <div class="col-lg-5">
                        <img src="assets/img/img2.jpg" class="img-fluid img2 " alt="Responsive image">
                    </div>
                </div>
            </div>
        </section>
        <!------------translate----------->
        <section class="mt-5 pt-5 translate">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-12 text-center pb-3">
                                        <h2>Translate</h2>
                                        <hr>
                                    </div>
                                </div>
                                <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group w-50">
                                            <select class="form-control" name="source" id="exampleFormControlSelect1">
                                                <option value="id" selected>Indonesia</option>
                                                <option value="ja">jepang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group w-50">
                                            <select class="form-control" name="target" id="exampleFormControlSelect1">
                                                <option value="ja" selected>jepang</option>
                                                <option value="id">indonesia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        </div>
                                        <button type="submit" name="kirim" class="btn btn-primary btn-jumbo mb-4 pl-5 pr-5">Submit</button>
                                    </div>
                                    <div class="col-md-6">
                                </form>    
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" readonly>
                                                    <?php
                                                    require_once ('vendor/autoload.php');
                                                    use \Statickidz\GoogleTranslate;
                                                    if(isset($_POST['kirim'])) {
                                                        $source=$_POST['source'];
                                                        $target=$_POST['target'];
                                                        $text=$_POST['text'];
                                                        $trans = new GoogleTranslate();
                                                        $result = $trans->translate($source, $target, $text);                 
                                                        echo "$result";
                                                    }
                                                    ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------kelas----------->
        <section id="kelas" class="kelas mt-5 pt-5">
            <div class="container">
                <div class="row mb-5">
                    <h2>Kelas</h2>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <a href="./kelas/hiragana.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Hiragana</h3>
                                    <p>(ひらがな)</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="./kelas/katakana.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Katakana</h3>
                                    <p>(カタカナ)</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="./kelas/kanji.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Kanji</h3>
                                    <p>カンジ</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="./kelas/partikel.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Partikel</h3>
                                    <p>.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="./kelas/bahasa.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Tata Bahasa jepang</h3>
                                    <p>.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="./kelas/ungkapan.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Ungkapan</h3>
                                    <p>.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="./kelas/kotowaza.php">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3>Kotowaza - Peribahasa</h3>
                                    <p>.</p>
                                </div>
                            </div>
                        </a>
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

        <?php include "./kelas/include/kontak.php"; ?>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="js/costum.js"></script>
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