<?php
$user = 0;
$succed = 0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select *  from `registrations` where username = '$username'";
    $result = mysqli_query($con , $sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num> 0){
            // echo 'user already exist';
            $user = 1;
        }else{
            $sql = "insert into `registrations` (username, password)
            values('$username' , '$password')";
            $result = mysqli_query($con , $sql);
            if($result){
                // echo 'data inserted succesfully';
                    $succed = 1;
            }else{
                die(mysqli_error($con));
        }
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php
        if($user){
            echo '<div class="alert alert-danger" role="alert">
            This user already exist!
          </div>';
        }
    ?>
       <?php
        if($succed){
            echo '<div class="alert alert-success" role="alert">
            You successfully singed up.
          </div>';
        }
    ?>
   <div class="container">
   <form  action = 'signup.php' method = 'post'>
   <h1 class="h1">REGISTRATION</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"  >Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'username'>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name = 'password'>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</body>
</html>