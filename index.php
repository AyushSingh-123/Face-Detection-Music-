
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JavaScript Form Validation</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <style>
        *{
             margin: 0; 
             /* margin: auto; */

            /* display: block; */
            /* width: 100%; */

            padding: 0;
             justify-content: center;
            align-items: center; 
            /* display: block; */
            
            }
        body {
            background: url(S.jpg) no-repeat center center fixed;
            background-size: cover;
            padding: 10px 50px;
            background-color: aqua, red;
            margin: auto;
            display: block;
        }

        .formdesign {
            font-size: 20px;
            /* align-items: center; */
            display: flex;
            text-decoration: none;
            margin: 10px 20px;
            justify-content: center;
            align-items: center;
            text-align: center;

        }
        #pass{
            display: flex;
            margin: auto;
            justify-content: center;
        }
        .container{
            display: block;
            height: 500px;
            width: 800px;
            /* width: 400px; */
            /* width: auto; */
            margin: 70px 300px;
            /* background-color: aqua; */
            justify-content: center;
            border-radius: 10px;
            color: rgb(249, 249, 249);
            align-items: center;
            background-image: url("smoke.jpg");
            background-color: rgb(228, 222, 222);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 800px 950px;
            opacity: 0.6;
            /* border: 2px solid gray; */
        }
        #cpass{
            /* display: flex;
            /* margin: 15px 15px;
              /*margin: auto auto; */
            /* justify-content: center;
            align-items: center; */ 
            display: flex;
             margin: 10px 10px;
             justify-content: center;

        }
        #name{
             display: flex;
             margin: 12px 10px;
        }
        #email{
            display: flex;
             margin: 12px 10px;
        }


        .formdesign input {
            width: 50%;
            padding: 12px ;
            border: 1px solid blue;
            margin: 14px 10px;
            /* border-radius: 2px; */
            color: rgb(0, 0, 0);
            border-radius: 10px;
            text-align: center;
            font-size: 15px;
            background-color: rgb(251, 248, 248);
        }

        .formerror {
            color: red;
            /* margin: 12px; */
        }

        .but {
            border-radius: 9px;
            width: 100px;
            display: block;
            height: 50px;
            font-size: 25px;
            margin:  10px auto;
            background-color: burlywood;
        }
        .but:hover{
            background-color: aqua;
            box-shadow: 12px 12px rgb(240, 103, 103);
            text-align: center;
            /* animation: ayush 3 0.3 0.2 5 alternate fill-mode; */
            animation: ayush 0.5s ease-in 1s 10 backwards;
            transform: rotate(5deg);

        }
        @keyframes ayush {
            from{
                width: 100px;

            }
            to{
                width: 200px;
            }
            

            }
            
        
    </style>
    <h1>Registration Page</h1>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $con = mysqli_connect("localhost","root");
                mysqli_select_db($con,"test");
                if($con){
                    $name = $_POST['fname'];
                    $email = $_POST['femail'];
                    $phone = $_POST['fphone'];
                    $pass = $_POST['fpass'];

                    $query = "INSERT INTO `login`(`name`, `phone`, `email`, `password1`) VALUES ('".$name."','".$phone."','".$email."','".$pass."');";
                    $result = mysqli_query($con, $query);
                    if($result){
                        echo '<script>window.alert("Registerd Successfully")</script>';
                        header("Location: harry.php");
                    }
                }
            }
        ?>
    <form aciton ="index.php" name="myForm" onsubmit="return validateForm()" method="POST">
        <div class="formdesign" id="name">
            Name: <input type="text" name="fname" required><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="email">
            Email: <input type="email" name="femail" required><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="phone">
            Phone: <input type="phone" name="fphone" required><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="pass">
            Password: <input type="password" name="fpass" required><b><span class="formerror"</span></b>
        </div>

        <!-- <div class="formdesign" id="cpass">
            Confirm Password: <input type="password" name="fcpass" required><b><span class="formerror"></span></b>
        </div> -->
        <input class="but" onclick="display()" type="submit" value="Submit">
    </div>
    <script>
        // function display(){
        //     window.location="punjabi.html";
        // }
    </script>

        <!-- <input class="but" type="submit" value="Submit"> -->

    </form>
</body>
<script src="index.js"></script>

</html>