<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Ke Perpustakaan</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['register'])) {
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_telepon = $_POST['no_telepon'];
                                                $username = $_POST['username'];
                                                $level = $_POST['level'];
                                                $password = md5($_POST['password']);
                                                
                                                // Prepare and execute the SQL statement
                                                $stmt = $koneksi->prepare("INSERT INTO user (nama, email, alamat, no_telepon, username, password, level) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                                $stmt->bind_param("sssssss", $nama, $email, $alamat, $no_telepon, $username, $password, $level);
                                                
                                                if ($stmt->execute()) {
                                                    echo '<script>alert("Selamat, register berhasil. Silahkan Login"); location.href = "login.php";</script>';
                                                } else {
                                                    echo '<script>alert("Register gagal, silahkan ulangi kembali");</script>';
                                                }
                                                
                                                $stmt->close();
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group mb-3">
                                                <label>Nama Lengkap</label>
                                                <input class="form-control" type="text" required name="nama" placeholder="Masukan Nama Lengkap" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Email</label>
                                                <input class="form-control" type="email" required name="email" placeholder="Masukan Email" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>No Telepon</label>
                                                <input class="form-control" type="text" required name="no_telepon" placeholder="Masukan No. Telepon" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Alamat</label>
                                                <textarea class="form-control" required name="alamat" rows="5" placeholder="Masukan Alamat"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="inputEmail">Username</label>
                                                <input class="form-control" id="inputEmail" type="text" required name="username" placeholder="Masukan Username" />
                                            </div>            
                                            <div class="form-group mb-3">
                                                <label for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" required name="password" type="password" placeholder="Masukan Password" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="inputLevel">Level</label>
                                                <select name="level" required class="form-control py-4">
                                                     <option value="peminjaman">Peminjaman</option>
                                                     <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            &copy; 2024 Perpustakaan Digital lucky.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
