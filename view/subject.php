<?php
   session_start();
    include ("../bd.php");


$tid=$_SESSION['tid'];
print<<< HERE

        <link rel="stylesheet" type="text/css" href="../css/style.css">
HERE;


function show_list() 
{ 
    print<<< HERE

        <link rel="stylesheet" type="text/css" href="../css/style.css">
HERE;
    global $db;
    
$result2 = mysqli_query($db,"SELECT subject_id,subject_name FROM `subject` "); 

echo '<h2>Список предметов</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>Предмет</th><th> </th><th> </th></tr>'; 
  while ( $group = mysqli_fetch_array($result2))
  { 
    echo '<tr>'; 
    echo '<td>'.$group['subject_name'].'</td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=editform&id='.$group['subject_id'].'">Редактировать</a></td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=delete&id='.$group['subject_id'].'">Удалить</a></td>'; 
    echo '</tr>'; 
  } 
  echo '</table>';
  echo '<p><a href="'.$_SERVER['PHP_SELF'].'?action=addform">Добавить</a></p>';  
}
function get_add_item_form() 
{ 
echo '<h2>Добавить</h2>'; 
echo '<form name="addform" action="'.$_SERVER['PHP_SELF'].'?action=add" method="POST">'; 
echo '<table>'; 
echo '<tr>'; 
echo '<td>Предмет</td>'; 
echo '<td><input type="text" name="nm_group" value="" /></td>'; 
echo '</tr>'; 
echo '<tr>'; 
echo '<td><input class="but" type="submit" value="Сохранить"></td>'; 
echo '<td><button class="but" type="button" onClick="history.back();">Отменить</button></td>'; 
echo '</tr>'; 
echo '</table>'; 
echo '</form>'; 
} 


function add_item() 
{ 
    global $db;

$nm_group = mysqli_escape_string($db, $_POST['nm_group']); 
//echo $tid;
//echo $nm_group;
if (!empty($nm_group))
$query =  mysqli_query($db,"INSERT INTO `subject` (`subject_name`) VALUES ('".$nm_group."')"); 
//$query = "INSERT INTO 'group'(name_group) VALUES ('".$nm_group."')"; 
//mysqli_query ($db, $query ); 
show_list();
//header('Location: '.$_SERVER['PHP_SELF'],false); 
die(); 
} 

// Функция формирует форму для редактирования записи в таблице БД 
function get_edit_item_form() 
{ 
    global $db;
echo '<h2>Редактировать</h2>'; 
$query = 'SELECT `subject_name` FROM `subject` WHERE `subject_id`='.$_GET['id']; 
$res = mysqli_query($db, $query); 
$group = mysqli_fetch_array($res); 
echo '<form name="editform" action="'.$_SERVER['PHP_SELF'].'?action=update&id='.$_GET['id'].'" method="POST">'; 
echo '<table>'; 
echo '<tr>'; 
echo '<td>Название предмета</td>'; 
echo '<td><input type="text" name="nm_group" value="'.$group['subject_name'].'"></td>'; 
echo '</tr>'; 
echo '<tr>'; 
echo '<td><input class="but" type="submit" value="Сохранить"></td>'; 
echo '<td><button class="but" type="button" onClick="history.back();">Отменить</button></td>'; 
echo '</tr>'; 
echo '</table>'; 
echo '</form>'; 
} 

// Функция обновляет запись в таблице БД 
function update_item() 
{ 
    global $db;
$nm_group = mysqli_escape_string($db, $_POST['nm_group']); 
//$nm_group = mysqli_escape_string($db, $_POST['group_name'] ); 
if (!empty($nm_group))
$query = mysqli_query ($db,"UPDATE `subject` SET subject_name='".$nm_group."' WHERE subject_id='".$_GET['id']."'"); 
//$query =  mysqli_query($db,"INSERT INTO `group` (`tid`,`group_name`) VALUES ('".$tid."','".$nm_group."')"); 

//header( 'Location: '.$_SERVER['PHP_SELF'], false ); 
show_list();
die(); 
} 

// Функция удаляет запись в таблице БД 
function delete_item() 
{ 
    global $db;
$query = "DELETE FROM `subject` WHERE subject_id=".$_GET['id']; 
mysqli_query ($db, $query ); 
show_list();
//header( 'Location: '.$_SERVER['PHP_SELF'] ); 
die(); 
} 










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

if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist"; 

switch ( $_GET["action"] ) 
{ 
case "showlist": // Список всех записей в таблице БД 
show_list(); break; 
case "addform": // Форма для добавления новой записи 
get_add_item_form(); break; 
case "add": // Добавить новую запись в таблицу БД 
add_item(); break; 
case "editform": // Форма для редактирования записи 
get_edit_item_form(); break; 
case "update": // Обновить запись в таблице БД 
update_item(); break; 
case "delete": // Удалить запись в таблице БД 
delete_item(); break; 
default: 
show_list(); 
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

