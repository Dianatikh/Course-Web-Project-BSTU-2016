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
?>
<form name="chooseTest" method="POST"  action="'.$_SERVER['PHP_SELF'].'?action=add">
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

    echo '<option value="'.$id.'">'.$name.'</option>'; 
}
?>
</select>
</td>
</tr>
<tr> 
    <form name='subjtest' action='' method='post' >

     <td>Из какой категории тест? </td>
    <td>
    <select name="subject" onChange='document.subjtest.submit();'>
<?php  

  $result = mysqli_query($db,"SELECT * FROM `subject` ");  
while($row = mysqli_fetch_array($result))
{
    $id = $row['subject_id']; 
    
    $name = $row['subject_name']; 

    echo $id;
    echo $name;

    echo '<option value="'.$id.'">'.$name.'</option>'; 
}
?>
</select>
</td>  
<tr> 
     <td>Выберите тест </td>
    <td>
        <td>
<select name="test">
    <?php

switch($_POST['subject']){
    case'':
	break;

case '$id':
  $result = mysqli_query($db,"SELECT * FROM `test` where `id_subject`="'.$id.'" ");  
while($row = mysqli_fetch_array($result))
{
    $tid = $row['test_id']; 
    
    $tname = $row['test_name']; 

    echo $tid;
    echo $tname;

    echo '<option value="'.$tid.'">'.$tname.'</option>'; 
}
break;

}
?>
</select>
</td>
</tr>
<?php






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

