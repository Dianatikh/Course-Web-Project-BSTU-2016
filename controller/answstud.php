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


$result2 = mysqli_query($db,"SELECT `sid`,`login`  FROM `student` WHERE `gid`='$gid'"); 
 
while ( $sid[] = mysqli_fetch_array($result2));
   
   
    $i=0;
while($sid[$i]['login'])
{
 echo $sid[$i]['login'];
    echo "|";
$sidt=$sid[$i]['sid'];
echo $sidt;
   $res =  mysqli_query($db,"SELECT `complete`,`point` FROM `result` WHERE `sid`='$sidt' AND `test_id`='$test_id'");  
    while ( $stud = mysqli_fetch_array($res))
  { 
    //echo $sid['login'];
    echo "|comple";
    echo $stud['complete'];
    echo "|point";
    echo $stud['point'];
    echo "|";
    } 
    $i++;
}
   /*
    */
     
  
  






		
          
            }

if (empty($_SESSION['key']) and empty($_SESSION['password'])) {
print<<< HERE

<div id="mainframe">
<h1>Чтобы зайти на эту страницу, надо бы зарегистрироваться:)</h1>
</div>


HERE;
}
//echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=../view/result.php'></head></html>";





?>

