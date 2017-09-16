<?php
          session_start();
          if    (empty($_SESSION['name']) and empty($_SESSION['password']) and empty($_SESSION['key'])) 
          {
          
          exit ("Доступ на эту    страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='index.php'>Главная    страница</a>");
          }
          
unset($_SESSION['password']);
            unset($_SESSION['name']); 
            unset($_SESSION['tid']);
            unset($_SESSION['login']); 
            unset($_SESSION['sid']);
            unset($_SESSION['key']);
            setcookie("auto", "",    time()+9999999);
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
            
            ?>