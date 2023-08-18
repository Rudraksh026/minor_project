<?php
    include 'dp.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name= $_POST['fname']." ".$_POST['lname'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $sql = "SELECT * FROM `user_detail` WHERE `email` LIKE '$email';";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($result);
        if($password == $cpassword && $rows == 0){

        // insert into database
            $sql = "INSERT INTO `user_detail` ( `name`, `birthday`, `gender`, `email`, `number`, `password`, `created on`) VALUES ( '$name', '$birthday', '$gender', '$email', '$number', '$password', current_timestamp());";
            $result = mysqli_query($conn,$sql);
            if($result){   
                session_start();
                $_SESSION['adminName'] = $name;
                $_SESSION['email']= $email;
                header("location: home.php");
                
            }
        }
        else if($password != $cpassword){
            echo "<Script>alert('Password must be same');</script>";
        }
        else{
            echo "<Script>alert('Account had already exists');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

        * {
            font-family: 'Varela Round', sans-serif;
            box-sizing: border-box;
            color: white;
            margin: 0;
            padding: 0;
        }

        body {
            background: url(img/login_signup_background.gif);
            background-size: 200% 200%;
            background-size: cover;
        }

        .container {
            border: 2px solid rgba(255, 255, 255, 0.523);
            width: 40%;
            margin: 80px auto;
            padding: 40px;
            border-radius: 20px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
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
        input[type="password"],
        input[type="number"] {
            width: 100%;
            border: none;
            border-bottom: 2px solid white;
            background-color: #393c51;
        }

        input {
            margin: 5px 0px;
            outline: none;
            padding: 5px;
            color:white;
        }

        input[type="radio"] {
            margin: 0 5px;
        }

        button {
            color: #171820;
            height: 30px;
            padding: 5px 20px;
            font-weight: bold;
            border-radius: 5px;
            border: none;
            outline: none;
            cursor: pointer;
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

    <div class="container">
        <h1>Register Yourself</h1>
        <form action="register.php" method="post">

            <div>
                <label for="fname">First Name<br></label>
                <input type="text" id="fname" name="fname" required>
            </div>
            <div>
                <label for="lname">Last Name<br></label>
                <input type="text" id="lname" name="lname">
            </div>
            <div>
                <label for="birthday">Birthday<br></label>
                <input type="date" id="birthday" name="birthday" required>
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
                <label for="password">Password<br></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="cpassword">Confirm Password<br></label>
                <input type="password" id="cpassword" name="cpassword" required>
            </div>
                <button>Register</button>
        </form>
    </div>
</body>

</html>