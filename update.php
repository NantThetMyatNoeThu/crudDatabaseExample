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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<?php

use Illuminate\Console\View\Components\Alert;

       require_once "./connectdb.php";
       $nid=$_GET['id'];
       $query="SELECT * FROM customer WHERE id='$nid'";
       $sql=mysqli_query($conn,$query);
       $row=mysqli_fetch_assoc($sql);
    //    var_dump($row);
    if(isset($_POST['ubtn'])){
        $name=$_POST['uname'];
        $tid=$_POST['uid'];
        $taddress=$_POST['uaddress'];
        $temail=$_POST['uemail'];
        $ttel=$_POST['utel'];
        $tweight=$_POST['uweight'];
        $tgender=$_POST['ugender'];
        $tdate=$_POST['udate'];
        
        if (preg_match("/\\s/", $name)) echo "<small style='color:red'>Please enter the valid name!</small>";
        
        $pattern = "/09/i";
        if(strlen($ttel)<11 || strlen($ttel)>11 || !preg_match($pattern,$ttel)){
            echo "<small style='color:red;'>Please enter valid number!</small>";
         }
        else{
            $uquery="UPDATE customer SET name='$name',phone='$ttel',address='$taddress',email='$temail',weight='$tweight',gender='$tgender',dob='$tdate'  WHERE id=$tid";
            $usql=mysqli_query($conn,$uquery);
            if($usql){
                header("location:./read.php");
            }else echo "Update is failed".mysqli_connect_error();
        }
        
}
    ?>
    <form method="post" style="margin-top: 30px; background-color: whitesmoke; width: 400px; height:550px;" class="ms-5">
    <div class="st">
        <label for="uname">User ID:</label>
        <input type="text" id="uname" value="<?php echo $nid; ?>" name="uid" required readonly>
    </div>
    <div class="st">
        <label for="uname">User Name:</label>
        <input type="text" id="uname" value="<?php echo $row['name']; ?>"  name="uname" required>
    </div>
    <div class="st">
        <label for="uname">Birthday:</label>
        <input type="date" id="uname" value="<?php echo $row['dob']; ?>" name="udate" required>
        </div>
        <div class="st">
            <label for="ugender">Gender:</label>
        <select id="gender" name="ugender" value="<?php echo $row['gender']; ?>" required>
        <option value="Male" >Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
        </select>
    </div>
    <div class="st">
        <label for="uweight">Weight</label>
        <input type="text" name="uweight" id="uweight" value="<?php echo $row['weight']; ?>" required>
    </div>
    <div class="st" required>
        <label for="utel">Phone:</label>
        <input type="tel" name="utel" id="utel" value="<?php echo $row['phone']; ?>">
    </div>
    <div class="st">
        <label for="uemail">Email</label>
        <input type="email" name="uemail" id="uemail" value="<?php echo $row['email']; ?>">
    </div>
    <div class="st">
        <label for="uaddress">Address</label>
        <input type="text" name="uaddress" id="uaddress" value="<?php echo $row['address']; ?>">
    </div>
        <input type="submit" value="Update" name="ubtn" class="btn btn-secondary rounded ps-3 pe-3 rounded-pill float-end me-3">
    </form>
   
</body>
</html>