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

echo '<form name="chooseTest"  action="'.$_SERVER['PHP_SELF'].'?action=add" method="POST">'; 

//<form name="chooseTest" method="POST"  action="../controller/answstud.php">
//<form name="chooseTest" method="POST"  action="'.$_SERVER['PHP_SELF'].'?action=add$id='.$_GET['id'].'" >
?>
<h2>Просмотр результатов</h2>
<table>
    <tr>
          <td>Выберите группу </td>
    <td>
        <td>
<select name="group">
    <?php
  $result = mysqli_query($db,"SELECT * FROM `group` WHERE `tid`='".$_SESSION['tid']."' ");  
while($row = mysqli_fetch_array($result))
{
    $id = $row['gid']; 
    
    $name = $row['group_name']; 

    echo $id;
    echo $name;

    echo '<option name="gid" value="'.$id.'">'.$name.'</option>'; 
}
?>
</select>
</td>
</tr>

<tr> 
     <td>Выберите тест </td>
    <td>
        <td>
<select name="test">
    <?php

  $result = mysqli_query($db,"SELECT * FROM `test`");  
while($row = mysqli_fetch_array($result))
{
    $tid = $row['test_id']; 
    
    $tname = $row['test_name']; 

    echo $tid;
    echo "-tid ";
    echo $tname;

    echo '<option name="tid" value="'.$tid.'">'.$tname.'</option>'; 

}
?>
</select>
</td>
</tr>
</table>
<input type="submit" name="Submit" class="but" value="Найти">
</form>

<?php

 function show_item()

 {
     global $db;
     $gid=$_POST['group'];
$groupn = mysqli_query($db,"SELECT `group_name` FROM `group` WHERE `gid`='$gid'"); 
$gn = mysqli_fetch_array($groupn);

$test_id=$_POST['test'];
$testn = mysqli_query($db,"SELECT `test_name` FROM `test` WHERE `test_id`='$test_id'"); 
$tn = mysqli_fetch_array($testn);


echo '<h2>Список</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo 'Название группы <b>  '.$gn[0].'</b>     Название теста <b>   '.$tn[0].'</b>';
  echo '<tr><th>Студент</th><th>Пройдено</th><th>Очков</th></tr>'; 

$result2 = mysqli_query($db,"SELECT `sid`,`login`  FROM `student` WHERE `gid`='$gid'"); 
 
while ( $sid[] = mysqli_fetch_array($result2));
   
   
    $i=0;
while($sid[$i]['login'])
{
 
$sidt=$sid[$i]['sid'];

   $res =  mysqli_query($db,"SELECT `complete`,`point` FROM `result` WHERE `sid`='$sidt' AND `test_id`='$test_id'");  
    while ( $stud = mysqli_fetch_array($res))
  { 
    echo '<tr>'; 
    echo '<td>'.$sid[$i]['login'].'</td>'; 
    if($stud['complete'])
    echo '<td>YES</td>'; 
    else
    echo '<td>NO</td>'; 
    echo '<td>'.$stud['point'].'</td>'; 
    echo '</tr>';
    } 
    $i++;
}
 }
/*{
  global $db;
  
  $tid = $_POST['test'];
  $gid = $_POST['group'];
echo '<h2>Список</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>Студент</th><th>Пройдено</th><th>Очков</th></tr>'; 
 
   $result = mysqli_query($db,"SELECT `sid`, `login`  FROM `student` WHERE  `gid`='.$gid.'");
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
  

}
 echo '</table>';

    echo $tid;
    echo "|";
    echo $gid;

}*/


switch ( $_GET["action"] ) 
{ 
 
case "add": 
show_item(); break; 


}

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

