<?php
  
$con = mysqli_connect("localhost","root","","pubg"); 

$sq_name = $_POST['sq_n'];
$pubg_ids = $_POST['p_ids'];
$ph = $_POST['phone'];
$city = $_POST['city'];

$sel = "select * from reg where sqn='$sq_name'";
$run = mysqli_query($con,$sel);
$check = mysqli_num_rows($run);

if($check==1){
    echo "<h1>This email is already registered</h1>";
        exit();
}
else{
    $insert = "insert into reg(sqn,pid,ph,cities) values ('$sq_name','$pubg_ids','$ph','$city')";
    $run_inesrt = mysqli_query($con,$insert);
    
    if($run_inesrt){
        echo "<h2> Registration Successful, Thanks </h2>";
    }
}

//print "<i>You account has been varified as: </i>";
//echo $_GET['email']; 

?>