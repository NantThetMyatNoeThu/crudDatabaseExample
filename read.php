<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body >
    <h3 class=" mt-5 text-center">User detail info page</h3>
    <div class=" ms-5 mt-5 d-flex justify-content-center">
    <table style=" border:1px solid black"> 
       <tr >
            <th style=" border:1px solid black">ID</th>
            <th style=" border:1px solid black">Name</th>
            <th style=" border:1px solid black">DOB</th>
            <th style=" border:1px solid black">Gender</th>
            <th style=" border:1px solid black">Weight</th>
            <th style=" border:1px solid black">Phone</th>
            <th style=" border:1px solid black">Email</th>
            <th style=" border:1px solid black">Address</th>
            <th style=" border:1px solid black">Options</th>
       </tr>
       <?php
       require_once "./connectdb.php";
       $query="SELECT * FROM customer";
       $sql=mysqli_query($conn,$query);
       while($row=$sql->fetch_assoc()){
        echo "
        <tr >
            <td style=' border:1px solid black'>{$row['id']}</td>
            <td style=' border:1px solid black'>{$row['name']}</td>
            <td style=' border:1px solid black'>{$row['dob']}</td>
            <td style=' border:1px solid black'>{$row['gender']}</td>
            <td style=' border:1px solid black'>{$row['weight']}</td>
            <td style=' border:1px solid black'>{$row['phone']}</td>
            <td style=' border:1px solid black'>{$row['email']}</td>
            <td style=' border:1px solid black'>{$row['address']}</td>
            <td style=' border:1px solid black'><a href='./update.php?id={$row['id']}' style='text-decoration: none;'>Update</a>|
            <a href='./delete.php?id={$row['id']}' style='text-decoration: none;'>Delete</a></td>
       </tr>
        ";

       }
       ?>
    </table>
 </div>
 
 <button class="btn btn-success mt-3 me-5 rounded rounded-pill float-end"><a href="./createdb.php" class="text-white" style="text-decoration: none;">Go back to enter new data</a></button>
   
</body>
</html>
<?php
?>