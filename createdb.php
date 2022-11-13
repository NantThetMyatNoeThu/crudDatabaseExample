<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .st{
            margin-top: 10px;
            font-size: large;
            padding: 10px 20px;
        }
    </style>
       <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div class="shadow bg-secondary" >
    <h3 class="text-center text-white mt-5">Create user info page</h3>
    <div class="d-flex justify-content-center ">
    <form method="post" style="margin-top: 30px; background-color: whitesmoke; width: 400px; height:500px;" class="mb-5">
        <div class="st">
        <label for="uname">User Name:</label>
        <input type="text" id="uname" placeholder="enter user name....." name="uname" required>
        </div>
        <div class="st">
        <label for="uname">Birthday:</label>
        <input type="date" id="uname" name="udate" required>
        </div>
        <div class="st">
            <label for="ugender">Gender:</label>
        <select id="gender" name="ugender" required>
        <option value="Male" >Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
        </select>
        </div>
        <div class="st">
            <label for="uweight">Weight</label>
            <input type="text" name="uweight" id="uweight" placeholder="in lb...">
        </div>
        <div class="st" required>
            <label for="utel">Phone:</label>
            <input type="tel" name="utel" id="utel" placeholder="09........." required>
        </div>
        <div class="st">
            <label for="uemail">Email</label>
            <input type="email" name="uemial" id="uemail" placeholder="alice12@gmail.com" required>
        </div>
        <div class="st" >
            <label for="uaddress">Address</label>
            <input type="text" name="uaddress" id="uaddress" required>
        </div>
        <input  type="submit" value="Submit" class="btn btn-dark text-muted rounded rounded-pill px-3" name="sbtn" style="margin-top: 10px; float:right;margin-right:10px;">
    </form>
    </div>
    </div>
    <?php
    require_once "./connectdb.php";
    if(isset($_POST['sbtn'])){
        $gen=$_POST['ugender'];
        $uname=$_POST['uname'];
        $uemail=$_POST['uemial'];
        $utel=$_POST['utel'];
        $uadd=$_POST['uaddress'];
        $uweight=$_POST['uweight'];
        $ugender=$_POST['ugender'];
        $udob=$_POST['udate'];
        $pattern = "/09/i";
           if(preg_match("/\\s/", $uname))
            echo "<small style='color:red'>Please enter valid number!</small>";
            if(strlen($utel)<11 || strlen($utel)>11 || !preg_match($pattern,$utel)){
                echo "<small style='color:red;'>Please enter valid number!</small>";
             }else { 
                 $query="INSERT INTO customer(name,dob,gender,weight,phone,email,address) VALUES('$uname','$udob','$ugender','$uweight','$utel','$uemail','$uadd')";
                 $sql=mysqli_query($conn,$query);
                 header("location:./read.php");
             }
           
        
    }
    ?>
</body>
</html>