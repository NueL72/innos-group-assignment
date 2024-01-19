<?php
    require_once ("config.php");

    session_start();
    
    if(isset($_POST['submit'])){
        $messageDescr = $_POST['Messagedescription'];
        $messageContent = $_POST['messagecontent'];
        $messageReply = $_POST['messageReply'];
        $Title = $_POST['title'];

        $sql = "INSERT INTO `reply`(`description`, `content`, `reply`, `Title`)  VALUES ('$messageDescr','$messageContent','$messageReply','$Title')";
        $query = mysqli_query($conn,$sql);

        $status = "";

        if($query){
            $status = "success";}
    }

    if (!empty($_GET['id'])) {
        $sql = "SELECT * FROM `messages` WHERE `id`=" . $_GET['id'] . ";";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
    
    
?>

<!-- if (isset($_POST['Add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE `admin` SET `id`='" . $id . "',`name`='" . $name . "',`email`='" . $email . "',`password`='" . $password . "',`role`='1' WHERE id='" . $_GET['id'] . "';";
    $query = mysqli_query($conn, $sql);
    // $results = mysqli_fetch_all($query);
    if ($query == true) {
        header('Location:admin.php');
    }
} -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="boostrap/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
hr {
    width: 800px;
    /* padding-bottom: 20px; */
}

h3 {
    padding-top: 20px;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GROUP NO 1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="margin-left: 70px;">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Group Members
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Enos Mussa</a></li>
                            <li><a class="dropdown-item" href="#">Amani Mpeta</a></li>
                            <li><a class="dropdown-item" href="#">Grace Panja</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">These are examples of group members</a></li>
                        </ul>
                    </li>
                    <div>
                        <a class="btn text-white" style="background-color: #25d366; width:50px;height:40px" href="#"
                            role="button">
                            sms
                        </a>
                        <span class="badge rounded-pill badge-notification bg-danger">10</span>
                    </div>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <section>

        <center>
            <h3>Welcome! here you can reply the sms</h3>
            <hr>
        </center>
        <center>
            <form action="" method="post">
                <div class="card mt-4" style="width:700px;">
                    <div class="card-header" style="font-weight: bolder;">
                        reply Citizen Message
                    </div>

                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <!-- <input type="text" class="form-control" name="name" id="floatingInput"> -->
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="Messagedescription" value="<?php echo $result['description']; ?>" style="margin-top:50px" readonly>
                            <label>Message Description</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Messagedescription" value="<?php echo $result['content']; ?>" style="margin-top:50px" readonly>
                            <label for="">message content</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="messageReply" class="form-control" id="" cols="10" rows="10" required></textarea>
                            <input type="hidden" name="title" value="<?php echo $result['Title']; ?>">
                            <label for="">reply message..</label>
                        </div>



                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"
                            style="float: right;">submit</button>
                    </div>
                </div>

            </form>
        </center>
    </section>

    <?php
    if($status == "success"){?>
    <script>
    Swal.fire({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success"
    });
    </script>
    <?php
        
    }
    ?>
</body>

</html>
<?php } ?>