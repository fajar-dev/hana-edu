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
        <section class="form reg mt-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center mt-5 pt-3">
                <h4>Selamat Datang Di</h4>
                <h3>HANA EDUCATION</h3>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                <div class="card w-100">
                  <div class="card-body p-5">
                    <h3>Register</h3>
                          <?php
                              $name = "";
                              $username = "";
                              $email = "";
                              $nomor = "";
                              $birthdate = "";
                              $gender = "";
                              $password = "";
                              if($_POST) {
                                  include "database/connecton.php";

                                  try {
                                      $query = "SELECT * FROM accounts WHERE username=:username or email=:email";
                                      
                                      $stmt = $con->prepare($query);

                                      $name = htmlspecialchars(strip_tags($_POST['name']));
                                      $username = htmlspecialchars(strip_tags($_POST['username']));
                                      $email = htmlspecialchars(strip_tags($_POST['email']));
                                      $nomor = htmlspecialchars(strip_tags($_POST['nomor']));
                                      $birthdate = htmlspecialchars(strip_tags($_POST['bod']));
                                      $gender = htmlspecialchars(strip_tags($_POST['gender']));
                                      $password = md5(htmlspecialchars(strip_tags($_POST['password'])));

                                      $stmt->bindParam(':username', $username);
                                      $stmt->bindParam(':email', $email);

                                      $stmt->execute();
                                      $num = $stmt->rowCount();

                                      if($num > 0) { 
                                          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <strong>Gagal melakukan registrasi !</strong><br>Username atau email sudah terdaftar
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button></div>';

                                      }
                                      else {
                                          try {
                                              $query = "INSERT INTO accounts SET 
                                                        name=:name, 
                                                        username=:username, 
                                                        email=:email,
                                                        nomor=:nomor,
                                                        birthdate=:birthdate, 
                                                        gender=:gender, 
                                                        password=:password,
                                                        level='user'";
                                              
                                              $stmt = $con->prepare($query);
              
                                              $stmt->bindParam(':name', $name);
                                              $stmt->bindParam(':username', $username);
                                              $stmt->bindParam(':email', $email);
                                              $stmt->bindParam(':nomor', $nomor);
                                              $stmt->bindParam(':birthdate', $birthdate);
                                              $stmt->bindParam(':gender', $gender);
                                              $stmt->bindParam(':password', $password);
              
                                              if($stmt->execute()) {
                                                  
                                                  header('Location: login.php?sukses');
                  
                                              }
                                              else {
                                                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Gagal melakukan registrasi !</strong><br>Silahkan periksa kembali data yang diinput
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button></div>';
                                              }
              
                                          }
                                          catch(PDOException $e) {
                                              die('Error: ' . $e->getMessage());
                                          }
                                          
                                      }

                                  }
                                  catch(PDOException $e) {
                                      die('Error: ' . $e->getMessage());
                                  }
                                  
                              }
                          ?>
                    <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
                      <div class="form-row mt-3">
                          <label for="validationCustom01">Name :</label>
                          <input type="text" name="name" class="form-control" onkeydown="return /[a-z, ]/i.test(event.key)" id="validationCustom01" placeholder="Your name ..." required>
                          <div class="valid-feedback">
                            Berhasil!
                          </div>
                          <div class="invalid-feedback">
                            Hanya diperbolehkan huruf dan spasi
                          </div>
                      </div>
                      <div class="form-row mt-3">
                        <label for="validationCustom01">Email :</label>
                        <input type="email" name="email" class="form-control" id="validationCustom02" placeholder="Your Email ..." required>
                        <div class="valid-feedback">
                          berhasil!
                        </div>
                        <div class="invalid-feedback">
                          Masukan email yang Valid <br> e.g example@mail.com
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <label for="validationCustom01">No. HP/WA :</label>
                        <input type="number" name="nomor" class="form-control" id="validationCustom02" placeholder="No. HP/WA" required>
                        <div class="valid-feedback">
                          berhasil!
                        </div>
                        <div class="invalid-feedback">
                          Hanya di perbolehkan karakter angka
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <label for="validationCustom01">Username :</label>
                        <input type="text" name="username" class="form-control" minlength="4"  id="validationCustom02" placeholder="Your Username ..." required>
                        <div class="valid-feedback">
                          Berhasil!
                        </div>
                        <div class="invalid-feedback">
                          Masukan setidaknya 4 karakter
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom03">Birth of Date :</label>
                          <input type="date"  name="bod" class="form-control" id="validationCustom03" placeholder="City" required>
                          <div class="valid-feedback">
                            Berhasil!
                          </div>
                          <div class="invalid-feedback">
                            Masukan tanggal lahir kamu
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="inputState">Genders :</label>
                          <select id="inputState" name="gender" class="form-control">
                                    <option disabled>Select</option>
                                    <?php if($gender == 'Male'): ?>
                                    <option value="male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <?php elseif($gender == 'Female'): ?>
                                    <option value="male">Male</option>
                                    <option value="Female" selected>Female</option>
                                    <?php else: ?>
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                    <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <label for="validationCustom01">Password :</label>
                        <input type="password" name="password" class="form-control" minlength="8"  id="validationCustom02" placeholder="Your Password ..." required>
                        <div class="valid-feedback">
                          Berhasil!
                        </div>
                        <div class="invalid-feedback">
                          Masukan minimal 8 karakter huruf atau angka
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">
                            Saya mengerti dan setuju dengan Ketentuan Penggunaan dan Kebijakan Privasi
                          </label>
                          <div class="invalid-feedback">
                            kamu harus menyetujui ketentuan pengguna.
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-lg btn-primary" type="submit"  value="Submit">DAFTAR</button>
                      <p class="mt-4">Sudah memiliki akun? <a href="login.php">LOGIN</a></p>
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
        <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script>
    </body>
</html>