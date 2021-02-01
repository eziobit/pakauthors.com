<?php
  
$con = mysqli_connect("localhost","root","","contactus"); 

$name = $_POST['name'];
$email = $_POST['email'];
$ph = $_POST['phone'];
$msg = $_POST['msg'];

$sel = "select * from messages where msg='$msg'";
$run = mysqli_query($con,$sel);
$check = mysqli_num_rows($run);

if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email )) {

	echo "<h4 class='text-danger' >Incorrect _ E-mail </h4>";
	exit();
}
else{
  
    $insert = "insert into messages(name,email,ph,msg) values ('$name','$email','$ph','$msg')";
    $run_inesrt = mysqli_query($con,$insert);
    
    if($run_inesrt){
        echo "<h4 class='c2' >We have received your MSG we will reply you soon</h4>";
    }

	}


//print "<i>You account has been verified as: </i>";
//echo $_GET['email']; 

?>