<?php
    if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if    (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') {    unset($email);} } 
    if    (empty($name) or empty($password) or empty($email)) 

            {

            exit    ("Вы ввели не всю информацию, вернитесь назад и заполните все    поля!"); 
                   }
            if    (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) 
            {exit    ("Неверно введен е-mail!");}

   include ("../bd.php");  include ("../bd.php");

  $password = mysqli_escape_string($db, $_POST['password']); 
  $name = mysqli_real_escape_string($db, $_POST['name']);

    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $name = stripslashes($name);
    $name = htmlspecialchars($name);
  
  

    
    $password = trim($password);
    $name = trim($name);
    
    
    
            if    (strlen($password) < 3 or strlen($password) > 15) {
            exit    ("Пароль должен состоять не менее чем из 3 символов и не более чем из    15.");
            }          
           



      
            $result = mysqli_query($db,"SELECT tid FROM teacher WHERE name='".mysql_real_escape_string($name)."'");
            $myrow = mysqli_fetch_array($result);
            if (!empty($myrow['tid'])) {
            exit ("Извините, такое имя уже есть в базе.");
            }          

            $result2 = mysqli_query ($db,"INSERT INTO teacher (password,name,email)    VALUES('".$password."','".$name."','".$email."')");
        
            if ($result2=='TRUE')
            {

            echo "Вы успешно зарегистрированы! Теперь вы можете зайти    на сайт. <a href='../index.php'>Главная страница</a>";

            }          
else {
            echo "Ошибка! Вы не зарегистрированы.";
                 }

            ?> 