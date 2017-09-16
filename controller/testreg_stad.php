<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте.
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
     if (isset($_POST['key'])) { $key=$_POST['key']; if ($key =='') { unset($key);} }
    
if ( empty($key)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
   
   
    $key = stripslashes($key);
    $key = htmlspecialchars($key);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
  

    
    $login = trim($login);
    $key = trim($key);
   

    include ("../bd.php");
   
 

   
 
$result = mysqli_query($db, "SELECT * FROM `student` WHERE  `key`='".mysqli_real_escape_string($db,$key)."' AND `login`='".mysqli_real_escape_string($db,$login)."' ");

            $myrow = mysqli_fetch_array($result);
            if (empty($myrow['sid']))
            {
                exit ("Извините, введённый    вами ключ неверный.");
            }
            else {        
                if    (isset($_POST['save'])){
          
          
          setcookie("key",    $_POST["key"], time()+9999999);
         
          setcookie("sid", $myrow['sid'],    time()+9999999);}


       
                      $_SESSION['key']=$myrow['key']; 
                    
                      
                      $_SESSION['sid']=$myrow['sid'];
                                 
        

  
           
            
            setcookie("key",    $_POST["key"], time()-9999999);
             
   }    
            echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>";

    ?>