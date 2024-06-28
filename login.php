<?php
    error_reporting(0);
    ob_start();
    session_start();

    $koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

    if ($_SESSION['admin'] || $_SESSION['user']) {
        header("location:index.php");
    } else {
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PERPUSTAKAAN</title>
    <link rel="icon" href="dist/img/unpam.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        body {
            background: url(https://bukaolshop.s3-id-jkt-1.kilatstorage.id/133226/818813927j.jpg) no-repeat fixed;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <br />
            </div>
        </div>
        <div class="row">
            <div align="center">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title center">
                                <img style="margin-left:15px; border-radius:7px" src="dist/img/unpam.png" class="img-thumbnail" width="150px" alt="">
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <br />
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                        <input type="text" class="form-control" placeholder="Masukan Username" name="nama" />
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Masukan Password" name="pass" />
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="submit" class="btn btn-primary" name="login" value="Login" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>

<?php
    if (isset($_POST['login'])) {
        $nama = $_POST['nama'];
        $pass = $_POST['pass'];

        // Use prepared statements to prevent SQL injection
        $stmt = $koneksi->prepare("SELECT * FROM tb_user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $nama, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $ketemu = $result->num_rows;

        if ($ketemu >= 1) {
            session_start();

            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['level'] = $data['level'];

            if ($data['level'] == "admin") {
                $_SESSION['admin'] = $data['id'];
                header("location:index.php");
            } else if ($data['level'] == "user") {
                $_SESSION['user'] = $data['id'];
                header("location:index.php");
            }
        } else {
            echo '<script type="text/javascript">alert("Username dan Password Anda Salah");</script>';
        }

        $stmt->close();
    }
}
?>