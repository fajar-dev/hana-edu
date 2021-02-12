<!doctype html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
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
                                <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                <div class="dropdown">
                                    <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelas <i class="fas fa-caret-down" style="font-size: 16px;;"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="kelas/hiragana.php">Hiragana</a>
                                            <a class="dropdown-item" href="kelas/katakana.php">Katakana</a>
                                            <a class="dropdown-item" href="kelas/kanji.php">Kanji</a>
                                            <a class="dropdown-item" href="kelas/partikel.php">Partikel</a>
                                            <a class="dropdown-item" href="kelas/ungkapan.php">Ungkapan</a>
                                            <a class="dropdown-item" href="kelas/bahasa.php">Tata Bahasa</a>
                                            <a class="dropdown-item" href="kelas/kotowaza.php">Kotowaza</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </nav>
        </section>
        <!---------form----------->
        <section class="form mt-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center mt-5 pt-3 mb-4">
                <h4>Selamat Datang Di</h4>
                <h3>HANA EDUCATION</h3>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="card w-100">
                  <div class="card-body p-5">
                                  <?php
                                    if(isset($_GET['sukses'])){
                                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Registrasi Berhasil !</strong> Silahkan Login.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                    }else if(isset($_GET['login'])){
                                      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            Kamu harus login untuk melanjutkan !!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                  }   
                                    if($_POST) {
                                        include "database/connecton.php";

                                        try {
                                            $query = "SELECT * FROM accounts WHERE username=:username and password=:password";
                                            
                                            $stmt = $con->prepare($query);

                                            $username = htmlspecialchars(strip_tags($_POST['username']));
                                            $password = md5(htmlspecialchars(strip_tags($_POST['password'])));

                                            $stmt->bindParam(':username', $username);
                                            $stmt->bindParam(':password', $password);

                                            $stmt->execute();
                                            $num = $stmt->rowCount();

                                            if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row);
                                            }

                                            if($num === 1) {
                                                session_start();
                                                
                                                $_SESSION['id'] = $id;
                                                $_SESSION['name'] = $name;
                                                $_SESSION['level'] = $level;

                                                if($level == "admin") {
                                                    header('Location: admin/Index.php');

                                                }
                                                else if($level == "user") {
                                                    header('Location: Index.php');
                
                                                }
                                                echo($level);
                                            }
                                            else {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Maaf !! <strong> Username </strong> atau <strong>Password</strong> Yang anda masukan salah !
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>';
                                            }

                                        }
                                        catch(PDOException $e) {
                                            die('Error: ' . $e->getMessage());
                                        }
                                    }
                                  ?>
                    <form method="POST" id="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username ..." required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ingat saya !</label>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block btn-jumbo mt-3" form="register-form" value="Submit">Login</button>
                      <p class="mt-4">Belum memiliki akun? <a href="register.php">DAFTAR</a></p>
                    </form>
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


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="./js/costum.js"></script>
    </body>
</html>