<?php
   session_start();
   include ("../bd.php");
$tid=$_SESSION['tid'];
 if (isset($_COOKIE['name']) and     isset($_COOKIE['password']))
            {
                     
                                $_SESSION['name']=$_COOKIE['name'];
                                $_SESSION['password']=$_COOKIE['password']; 
                                $_SESSION['tid']=$_COOKIE['tid'];
             }

if    (!empty($_SESSION['name']) and !empty($_SESSION['password']))
            {
     
            $login    = $_SESSION['name'];
            $password    = $_SESSION['password'];
            $result    = mysqli_query($db,"SELECT tid,name FROM teacher WHERE name='$name' AND    password='$password'"); 
            $myrow    = mysqli_fetch_array($result);
        
          

$gid=$_POST['group'];


$test_id=$_POST['test'];


$result2 = mysqli_query($db,"SELECT `sid` FROM `student` WHERE `gid`='$gid'"); 
 
while ( $sid = mysqli_fetch_array($result2))
  { 
   $res =  mysqli_query($db,"INSERT INTO `result` (`test_id`,`sid`,`complete`,`point`) VALUES ('".$test_id."','".$sid['sid']."','0','0')");   
  } 






		
          
            }

if (empty($_SESSION['key']) and empty($_SESSION['password'])) {
print<<< HERE

<div id="mainframe">
<h1>Чтобы зайти на эту страницу, надо бы зарегистрироваться:)</h1>
</div>


HERE;
}
echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=../view/result.php'></head></html>";





?>

