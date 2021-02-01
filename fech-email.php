<?php
  

 $connect = new PDO('mysql:host=localhost;dbname=news-letter', 'root', '');

$id = $_POST['id'];
$del_q = "DELETE No FROM emails WHERE  No = $id )";
$delo = $connect->prepare($del_q);
$delo->execute();











$query = "
SELECT No, email FROM emails WHERE 1 
ORDER BY No DESC 
";

$statement = $connect->prepare($query);

$statement->execute();

$data = $statement->fetchAll();

$output = '';
foreach ($data as $row) {

 $output .= '
 <div class="mb-2 " style="width:90%;" >
    <div class="h4 c2 p-1 "> 
       #<b id="mail-id">'.$row["No"].'</b>  <b class="c1" >'.$row["email"].'</b>
    <div class="" align="left"><button type="button " class="reply bg-light "  style="border: solid 2px #3F95EA;
    border-radius: 6px;color: #3F95EA;padding: 2px 13px 2px 13px;" id="'.$row["No"].'">Delete</button></div>
    </div>
  
 </div>
  ';}
  echo $output;



 /*if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email )) {

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
        echo "<h4> Subscribed Successfully , Thanks </h4>";
    }

	}

}


*/


//print "<i>You account has been varified as: </i>";
//echo $_GET['email']; 

?>