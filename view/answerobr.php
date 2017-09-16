<?php
   session_start();

    include ("../bd.php");
    $key=$_SESSION['key'];
print<<< HERE

        
HERE;

			 if ( isset($_COOKIE['key']))
            {
                     
                                $_SESSION['key']=$_COOKIE['key'];
                                $_SESSION['sid']=$_COOKIE['sid'];
             }
if    (!empty($_SESSION['key']))
            {
     
           
            $key    = $_SESSION['key'];
            $result = mysqli_query($db, "SELECT * FROM `student` WHERE  `key`='$key' ");
            $myrow    = mysqli_fetch_array($result);
            $sid=$myrow['sid'];
   





    $query = 'SELECT `test_name`,`count_questions`,`count_options` FROM `test` WHERE `test_id`='.$_GET['id']; 
    $res = mysqli_query($db, $query); 
    $test = mysqli_fetch_array($res); 

    $Number=$test['count_questions'];   
    $Options=$test['count_options'];
   
    $test_id=$_GET['id'];
   
    $result = mysqli_query($db,"SELECT `qid`,`question` FROM  `questions` WHERE `test_id`='".$test_id."'"); 
  $rows = mysqli_num_rows($result); 
  
    for($i = 0;$i < $rows;$i++) { 
        $Quest[$i] = mysqli_fetch_array($result); 
        //echo $Quest[$i]['question'];
    } 

$QuestNumber=0;
$k=$Number;
$point=0;
while($k>0){  
         $nameQch=$_POST["nameQ_$QuestNumber"];  
       $nameQid=$_POST["idq_$QuestNumber"];  
       $qid = $Quest[$QuestNumber]['qid'];

$result1 = mysqli_query($db,"SELECT `aid` FROM  `answers` WHERE `qid`='".$qid."' AND `right_answer`='1'"); 
$rows1 = mysqli_num_rows($result1); 
  
    for($i = 0;$i < $rows1;$i++) { 
        $Opt[ $QuestNumber][$i] = mysqli_fetch_array($result1);   
        if($nameQch==$Opt[ $QuestNumber][$i]['aid']) $point++;
    }


 $k--;
 $QuestNumber++;
}
////

$result11 = mysqli_query($db,"UPDATE `result` SET `point`='".$point."', `complete`='1'  WHERE `sid`='".$sid."' AND `test_id`='".$test_id."'"); 


echo '<meta http-equiv="refresh" content="0; url=http://testkursr/view/resultstud.php">';       
}
?>










