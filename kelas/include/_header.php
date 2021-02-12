<?php
session_start();
if((isset($_SESSION['level']) && ($_SESSION['level'] == "admin"))) {
    header('Location: ../admin');
}else if((isset($_SESSION['level']) && ($_SESSION['level'] == "user"))) {
    header('');
}else{
    header('Location: ../login.php?login');
}
include "../database/connecton.php";
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
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <!--fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@700&display=swap" rel="stylesheet">
        <!------favicon------>
        <link rel="shortcut icon" href="">
        <!---------------------------------------->
        <title>Hana Education</title>

        <!---------------------------
        + for submission dicoding +
        ---------------------------->

    </head>
    <body class="bg-custom">
        <!---------navbar----------->
        <section class="nav-navbar fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light active ">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <h1>はな</h1>
                    </a>
                    <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                                <div class="dropdown">
                                    <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelas <i class="fas fa-caret-down" style="font-size: 16px;;"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="hiragana.php">Hiragana</a>
                                            <a class="dropdown-item" href="katakana.php">Katakana</a>
                                            <a class="dropdown-item" href="kanji.php">Kanji</a>
                                            <a class="dropdown-item" href="partikel.php">Partikel</a>
                                            <a class="dropdown-item" href="ungkapan.php">Ungkapan</a>
                                            <a class="dropdown-item" href="bahasa.php">Tata Bahasa</a>
                                            <a class="dropdown-item" href="kotowaza.php">Kotowaza</a>
                                        </div>
                                </div>
                                <?php if(!isset($_SESSION['level'])): ?>
                                <a class="nav-item btn btn-primary tombol pl-4 pr-4" href="../register.php">DAFTAR</a>
                                <a class="nav-item btn btn-danger tombol pl-4 pr-4" href="../login.php">MASUK</a>
                                <?php else: ?>
                                <div class="dropdown">
                                    <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?> <i class="fas fa-caret-down" style="font-size: 16px;;"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                                        </div>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>  
            </nav>
        </section>