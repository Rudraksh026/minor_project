<!DOCTYPE html>
<html lang="en">
<?php
include "../dp.php";
session_start();
if (isset($_SESSION["username"])) {
    echo '<head>';
    include '../icon.php';
    echo ' 
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ADD SERVICE | ALSP</title>
            <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
            <style>
                @import url("https://fonts.googleapis.com/css2?family=Varela+Round&display=swap");
        *{
            font-family: "Varela Round", sans-serif;
            box-sizing: border-box;
            color: black;
            margin: 0;
            padding: 0;
        }
        body{
            padding-top: 10em;
        }
        .logo{
            width: 90px;
        }
        .container {
            border: 2px solid #039efc;
            width: 40%;
            margin: 80px auto;
            padding: 40px;
            border-radius: 20px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            box-shadow: 5px 5px 10px black;
        }
        .container h1 {
            width: 100%;
            margin: auto;
        }
        form {
            width: 100%;
        }
        .container form div {
            display: inline-block;
            width: 45%;
            margin: 25px 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        select,
        input[type="number"] {
            width: 100%;
            border: none;
            border-bottom: 2px solid #039efc;
            background-color: white;
        }
        input ,select{
            margin: 5px 0px;
            outline: none;
            padding: 5px;
            color:black;
        }
        input[type="radio"] {
            margin: 0 5px;
        }
        .button {
            color: black;
            height: 30px;
            padding: 5px 20px;
            font-weight: bold;
            border-radius: 5px;
            border: none;
            outline: none;
            cursor: pointer;
            background-color: #039efc;
            width:100%;
        }
        .search{
            display:none !important;
        }
        @media (max-width:1300px) {
            .container form div {
            display: inline-block;
            width: 100%;
            margin: 25px 10px;
        }
        }
        @media (max-width:500px) {
            .container{
                border:none;
                width: 100%;
            }
        }
            </style>
        </head>
        <body>
        <nav class="navbar bg-body-tertiary fixed-top" style="background-color: white !important;">
        <div class="container-fluid">
          <a class="navbar-brand" href="adminIndex.php"><img class="logo" src="../img/icon.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color:black;">Welcome on Servi-Connect</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="adminIndex.php">Home</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        </nav>
              <div class="container">
                <h1>Add Service</h1>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="fname">First Name<br></label>
                        <input type="text" id="fname" name="fname" required>
                    </div>
                    <div>
                        <label for="lname">Last Name<br></label>
                        <input type="text" id="lname" name="lname">
                    </div>
                    <div>
                        <label for="amount">Amount<br></label>
                        <input type="number" id="amount" name="amount" required>
                    </div>
                    <div>
                        <label>Gender<br></label>
                        <input type="radio" name="gender" id="male" value="M" required><label for="male">Male</label>
                        <input type="radio" name="gender" id="Female" value="F" required><label id="female" for="Female">Female</label>
                    </div>
                    <div>
                        <label for="email">Email<br></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="phoneNo">Phone Number<br></label>
                        <input type="number" id="phoneNo" name="number" required>
                    </div>
                    <div>
                        <label for="service">Service<br></label>
                        <select name="service" id="service" required>
                            <option value="none" selected disabled hidden>Select an Option</option>
                            <option value="Designer">Designer</option>
                            <option value="Developer">Developer</option>
                            <option value="Electrician">Electrician</option>
                            <option value="Plumber">Plumber</option>
                            <option value="Constructor">Constructor</option>
                            <option value="Insurance">Insurance</option>
                            <option value="Travel_agency">Travel agency</option>
                            <option value="Financial_services">Financial services</option>
                            <option value="Medical">Medical</option>
                            <option value="Legal_work">Legal Work</option>
                            <option value="Tutor">Tutor</option>
                            <option value="Sport_Academy">Sport Academy</option>
                            <option value="music_Academy">Music Academy</option>
                            <option value="dance_Academy">Dance Academy</option>
                            <option value="Freelancer">Freelancer</option>
                            <option value="Carpentar">Carpentar</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Editor">Editor</option>
                        </select>
                    </div>
                    <div>
                        <label for="location">Location<br></label>
                        <select name="location" id="location" required>
                        ';
    $sql = "SELECT DISTINCT location FROM service_details;";
    $result = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        echo '<option value=' . $data['location'] . '>' . $data['location'] . '</option>';
    }
    echo '
                        </select>
                    </div>
                    <div>
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="0" selected>Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                    <div>
                        <input id="photo" type="file" name="image" required>
                    </div>
                    <br>
                    <button class="button">Add Service</button>
                </form>
            </div>
              <script src="../javaScript/bootstrap/bootstrap.min.js"></script>
              <script src="../javaScript/sweetalert.mn.js"></script>
        ';
    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        $name = $_POST['fname'] . " " . $_POST['lname'];
        $amount = $_POST['amount'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $service = $_POST['service'];
        $location = $_POST['location'];
        $status = $_POST['status'];
        $img_name = $_FILES["image"]['name'];
        $img_size = $_FILES["image"]['size'];
        $tmp_name = $_FILES["image"]['tmp_name'];
        $error = $_FILES["image"]['error'];
        $num_length = strlen($number);
    $arr = explode('@', $email);
    $int_num = number_format($number);
    preg_match_all('!\d+!', $name, $matches);
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                if (((count($matches[0])) == 0) && ($int_num < 9999999999 || $int_num > 6000000000) && $num_length == 10 && ($arr[1] == "gmail.com" || $arr[1] == "yahoo.com" || $arr[1] == "hotmail.com" || $arr[1] == "outlook.com" )) {

                $sql = "INSERT INTO `service_details` (`name`, `email`, `gender`, `number`, `location`, `service`, `amount`,`image_url`,`active`) VALUES ('$name', '$email', '$gender', $number, '$location', '$service', $amount,'$new_img_name','$status');";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script>swal("Service Inserted successfully!", "", "success")
            .then((value) => {
                window.location.href =
                    "list.php";
            });</script>';
                }
            } 
            else if ($num_length != 10 || ($int_num > 9999999999 || $int_num < 6000000000)){
            echo '<script>swal ( "Oops" ,  "Phone number is not valid !" ,  "error" );</script>';
        } 
    
        else if ((count($matches[0])) > 0) {
            echo '<script>swal ( "Oops" ,  "Name does not contain any digit !" ,  "error" );</script>';
        }
    
    
        else if ($arr[1] != "gmail.com" && $arr[1] != "yahoo.com" && $arr[1] != "hotmail.com" && $arr[1] != "outlook.com" ){
            echo '<script>swal ( "Oops" ,  "Email is invalid !" ,  "error" );</script>';
        }
        
    
        else {
            echo '<script>swal ( "Oops" ,  "Invalid Details !" ,  "error" );</script>';
        }
        }
    else {
                ?>
                <script>swal("Oops", "Invalid Image Type!", "error");</script>
                <?php
            }
        
        }
    }
} else {
    echo '<script>
          window.location.href =
              "login.php";
      
      </script>';
}
?>
</body>

</html>