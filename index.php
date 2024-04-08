<?php
    require_once("config.php");

    if(!isset($_SESSION['user'])){
        session_start();
    }

    if(isset($_POST['submit'])){

        $username = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNumber'];
        $district = $_POST['district'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $sql = "INSERT INTO `Citizens`(`username`, `phone`, `email`, `password`, `District`) VALUES ('$username','$phone','$email','$password','$district')";
      
        $query = mysqli_query($conn,$sql);
        
        if($role=="citizen" && $query){
            $sql2 = "INSERT INTO `login`(`username`, `password`) VALUES ('$username','$password')";
            echo $sql2;
            $query2 = mysqli_query($conn, $sql2);
            
            if($query2 == true){

                $_SESSION['user'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['id'] = mysqli_insert_id($conn);
                // echo $_SESSION['id'];

                header("location:home.php");
            }
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
    <form action="" method="post">
        <center>
            <div class="card" style="width: 700px; margin-top:3%">
                <div class="card-header">
                    CITIZEN REGISTRATION FORM
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingInput">
                        <input type="hidden" name="id">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="floatingPassword" placeholder="Password">
                        <input type="hidden" value="citizen" name="role">
                        <label>Email</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="district" id="floatingPassword" placeholder="Password">
                        <label>District</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label>Password</label>
                    </div>
                    <div class="form-floating mb-3" style="display: flex; flex-direction:row;">
                        <button disabled="disabled" style="float: left; font-weight:bold;">+255</button>
                        
                        <input type="tel" id="phoneNumber" class="form-control" name="phoneNumber" placeholder="693-159-003"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required>
                            <label style="padding-left: 70px;">follow this format 693-159-003</label>
                    </div>
                </div>

                <div class="card-footer">
                    if Already have an Account <a href="login.php">Login here</a>
                    <button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px;">Register</button>
                </div>
            </div>
        </center>
    </form>
</body>

</html>