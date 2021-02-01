<?php
  
$con = mysqli_connect("localhost","root","","news-letter"); 
$email = $_POST['email'];

$sel = "select * from emails where email='$email'";
$run = mysqli_query($con,$sel);
$check = mysqli_num_rows($run);

 
 if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email )) {

	echo "<p class='text-warning' > Incorrect E-mail </p>";
	exit();
}
else{

if($check==1){
    echo "<h1>Already Subscribed</h1>";
        exit();
}

else{
  
    $insert = "insert into emails(email) values ('$email')";
    $run_inesrt = mysqli_query($con,$insert);
    
    if($run_inesrt){
        echo "<h4>Subscribed Successfully, Thanks</h4>";
    }

	}

}





//print "<i>You account has been verified as: </i>";
//echo $_GET['email']; 

?>