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

<form name="chooseTest" method="POST"  action="../controller/teststud.php">
<h2>Назначьте тест группе для прохождения</h2>
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
    echo $tname;

    echo '<option value="'.$tid.'">'.$tname.'</option>'; 

}
?>
</select>
</td>
</tr>
</table>
<input type="submit" name="Submit" class="but" value="Назначить">
</form>

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

