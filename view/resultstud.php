<?php
   session_start();

    include ("../bd.php");
    $key=$_SESSION['key'];
print<<< HERE

        <link rel="stylesheet" type="text/css" href="../css/main.css">
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
            require_once '../template/header.html';  
			require_once '../template/nav_stud.html';  



    global $db;
    global $sid;
    $res = mysqli_query($db, "SELECT `test_id` FROM `result` WHERE  `sid`='".$sid."'   ");
    while ($test[]   = mysqli_fetch_array($res));
echo '<h2>Результаты тестов</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>Тест</th><th>Пройден</th><th>Баллы</th></tr>'; 
$i=0;
while($test[$i][0])
{ 
    
    $test_id=$test[$i][0];
    
 $res1 = mysqli_query($db, "SELECT `test_name` FROM `test` WHERE  `test_id`='$test_id' ");
    $test_name[$i] = mysqli_fetch_array($res1);
$res2 = mysqli_query($db, "SELECT `complete`, `point`  FROM `result` WHERE  `test_id`='$test_id' AND `sid`='".$sid."'  ");
    while($res = mysqli_fetch_array($res2)){
   
   
    echo '<tr>'; 
    echo '<td>'.$test_name[$i][0].'</td>'; 
    echo '<td>';
    if($res['complete']) echo 'YES';
    else echo 'NO';
    echo '</td>'; 
    echo '<td>'.$res['point'].'</td>'; 
     echo '</tr>';  
    $i++;
}
}
 echo '</table>'; 
}

 





require_once '../template/footer.html';  
          

?>










