<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте.
if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } 
     if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
if (empty($name) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    include ("../bd.php");
   
 
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $name = stripslashes($name);
    $name = htmlspecialchars($name);
  
  

    
    $password = trim($password);
    $name = trim($name);
    
   

    
 
$result = mysqli_query($db,"SELECT * FROM    teacher WHERE name ='".mysqli_real_escape_string($db,$name)." ' AND    password='".mysqli_real_escape_string($db,$password)."'");
            $myrow    = mysqli_fetch_array($result);
            if (empty($myrow['tid']))
            {
                exit ("Извините, введённый    вами логин или пароль неверный.");
            }
            else {        
                if    (isset($_POST['save'])){
          
          setcookie("name ",    $_POST["name "], time()+9999999);
          setcookie("password",    $_POST["password"], time()+9999999);
         
          setcookie("tid", $myrow['tid'],    time()+9999999);}


       
                      $_SESSION['password']=$myrow['password']; 
                      $_SESSION['name']=$myrow['name']; 
                      
                      $_SESSION['tid']=$myrow['tid'];
                                 
        

  
           
            setcookie("name",    $_POST["name"], time()-9999999);
            setcookie("password",    $_POST["password"], time()-9999999);
             
   }    
            echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>";

    ?>