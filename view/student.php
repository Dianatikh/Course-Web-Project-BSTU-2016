<?php
   session_start();
    include ("../bd.php");

require_once '../template/header.html';  
 if (isset($_COOKIE['key']) )
            {
                     
                                $_SESSION['key']=$_COOKIE['key'];
                                
             }

if    (!empty($_SESSION['key']))
            {
     
            
            $key    = $_SESSION['key'];
            $result    = mysqli_query($db,"SELECT sid,gid,login FROM student WHERE    key='$key'"); 
            $myrow    = mysqli_fetch_array($result);
          
            }


print<<<HERE
    <div class="form">
     <h3>Войти как Ученик</h3>
   <div>
                            <form action="../controller/testreg_stad.php" method="post">
                                <fieldset>
                                  <p> <input  type="text" name="login" placeholder="Введите логин " required

>
                                   <p> <input  type="text" name="key" placeholder="Введите ключ " required

>
</p>         
<p>* Вход для ученика осуществляется с помощью ключа, который выдает учитель.
</p>                                
                                </fieldset>
                                
                                <p><input class="button" type="submit"   name="submit" value="Войти"></p>
                                <br>
                           
                                
                        
                                 
                            </form>
                        </div>
                    
                    
                        
                 
  </div>
HERE;
require_once '../template/footer.html'; 

?>


