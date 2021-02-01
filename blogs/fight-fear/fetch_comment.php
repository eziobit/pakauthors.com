<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=comments', 'Khawar', 'Gonawazgo4pti');

$query = "
SELECT * FROM fight_fear 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="mb-2 " style="width:90%;" >
  <div class="h3 c2 p-1 "><b>'.$row["comment_sender_name"].'</b> <i class="c1 h6 ">'.$row["date"].'</i></div>
  <div class="h5 c-dull ">'.$row["comment"].'</div>
  <div class="" align="left"><button type="button " class="reply bg-light "  style="border: solid 2px #3F95EA;
    border-radius: 6px;color: #3F95EA;padding: 2px 13px 2px 13px;" id="'.$row["comment_id"].'">Reply</button></div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM fight_fear WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }

/*
if($marginleft == 96)
{
  $marginleft  =  0 ; 
}
else{
    $marginleft = $marginleft + 0 ;
 }

*/

 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="mb-2" style="max-width:85%;margin-left:'.$marginleft.'px;">
    <div class="pl-2 c1 h6 p-1 "  ><b class="h4" >'.$row["comment_sender_name"].' </b> <i class="h6 c2 " >'.$row["date"].' (Replied) </i></div>
    <div class="h6 c-dull ">'.$row["comment"].'</div>
    <div class="panel-footer" align="left"><button type="button" class="reply bg-light " style="border: solid 2px #52d3aa;border-radius: 6px;color:#52d3aa;padding: 2px 10px 2px 10px;" id="'.$row["comment_id"].'">Reply</button></div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>