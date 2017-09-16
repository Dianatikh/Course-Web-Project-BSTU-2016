<?php
   session_start();
    include ("../bd.php");

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
            $result    = mysqli_query($db,"SELECT tid,name FROM teacher WHERE name='$name' AND  password='$password'"); 
            $myrow    = mysqli_fetch_array($result);
          
            }


print<<<HERE
    <div class="form">
     <h3>Войти как учитель</h3>
   <div>
                            <form action="../controller/testreg.php" method="post">
                                <fieldset>
                                   <p> <input  type="text" name="name" placeholder="Введите ваше имя" required

>
</p>         
<p> <input type="password" name="password" placeholder="Пароль" required
>
</p>                                
                                </fieldset>
                                
                                <p><input class="button" type="submit"   name="submit" value="Войти"></p>
                                <br>
                           
                                <a href="reg.php">Регистрация</a>
                        <a href="send_pass.php">Забыли  пароль?</a>
                        
                                 
                            </form>
                        </div>
                    
                    
                        
                 
  </div>
HERE;
require_once '../template/footer.html'; 

?>


