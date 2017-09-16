<?php
   session_start();
    include ("../bd.php");


$tid=$_SESSION['tid'];
print<<< HERE

        <link rel="stylesheet" type="text/css" href="../css/style.css">
HERE;

require_once '../template/header.html';  

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
        
          
        
		require_once '../template/nav_teach.html';  

 
  $tid = $_POST['test'];
  $gid = $_POST['group'];
echo '<h2>Список</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>Студент</th><th>Пройдено</th><th>Очков</th></tr>'; 
 
   $result = mysqli_query($db,"SELECT `sid`, `login`  FROM `student` WHERE  `gid`='.$gid.'") ;
  
 $res = mysqli_fetch_array($result);
 
   echo $res['login'];
   echo "|";
   
/*
        $stud[$i] = mysqli_fetch_array($res); 
        echo $stud[$i]['sid'];
    } 
*/
  /* $res1 = mysqli_query($db,"SELECT `complete`, `point`  FROM `result` WHERE  `sid`='.$row['sid'].'");  
while($row1 = mysqli_fetch_array($res1)){
echo '<tr>'; 
    echo '<td>'.$row['login'].'</td>'; 
    echo '<td>'.$row1['complete'].'</td>'; 
    echo '<td>'.$row1['point'].'</td>'; 
    echo '</tr>'; 
  

}*/
 echo '</table>';

    echo $tid;
    echo "|";
    echo $gid;


			require_once '../template/footer.html';  
          
            }

if (empty($_SESSION['key']) and empty($_SESSION['password'])) {
print<<< HERE

<div id="mainframe">
<h1>Чтобы зайти на эту страницу, надо бы зарегистрироваться:)</h1>
</div>


HERE;
}
require_once '../template/footer.html'; 




?>

