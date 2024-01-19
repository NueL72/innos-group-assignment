<?php
include_once 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['psw'];

    $sql = "SELECT * FROM `login` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query)) {
        
        $result = mysqli_fetch_array($query);

        if ($result['role'] == 'admin') {
            // $_SESSION['username'] = $username;
            header('location:adminPanel/admin.php');
        }

        if ($result['role'] == 'citizen') {
            // $_SESSION['username'] = $username;
            header('location:home.php');
        }

        if ($result['role'] == 'health') {
            // $_SESSION['username'] = $username;
            header('location:healthsms.php');
        }

        if ($result['role'] == 'infrastructure') {
            // $_SESSION['username'] = $username;
            header('location:infrastructuresms.php');
        }

        if ($result['role'] == 'education') {
            // $_SESSION['username'] = $username;
            header('location:education.php');
        }
    } else {
?>
        <script>
            alert("Invalid Username or Password or contact your admin for more details");
        </script>

<?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/boostrap5/css/bootstrap.css">
    <script src="assets/bootstrap5/js/bootstrap.js"></script>
</head>

<body>
    <form action="" method="POST">
        <center>
            <div class="card" style="width: 700px; margin-top:3%">
                <div class="card-header">
                    LOGIN FORM
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="psw" placeholder="Password">
                        <label>Password</label>
                    </div>
                </div>

                <div class="card-footer">
                    Don't have an Account <a href="index.php">Register here</a>
                    <button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px;">Login</button>
                </div>
            </div>
        </center>
    </form>
</body>

</html>