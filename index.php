<?php
   session_start();
    include ("bd.php");

require_once 'template/header.html';  
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
			require_once 'template/nav_teach.html';  
            print<<<HERE
            <div id="mainframe">
<h1>Добро пожаловать на сайт онлайн-тестирования</h1>
<p>Вы вошли на сайт как учитель, выбирите нужный пункт меню и начните работу </p>
</div>
HERE;
			require_once 'template/footer.html';  
          
            }
			 if ( isset($_COOKIE['key']))
            {
                     
                                $_SESSION['key']=$_COOKIE['key'];
                                $_SESSION['sid']=$_COOKIE['sid'];
             }
if    (!empty($_SESSION['key']))
            {
     
           
            $key    = $_SESSION['key'];
            $result = mysqli_query($db, "SELECT * FROM `student` WHERE  `key`='$key' ");
            $myrow    = mysqli_fetch_array($result);
			require_once 'template/nav_stud.html';  
                        print<<<HERE
 <div id="mainframe">
<p>Привет, ты здесь чтобы пройти тест или узнать результат тестирования? нажимай нужный пункт и начинай работу </p>
</div>
HERE;
			require_once 'template/footer.html';  
          
            }
if (empty($_SESSION['key']) and empty($_SESSION['password'])) {
print<<< HERE

<div id="mainframe">
<h1>Добро пожаловать на сайт онлайн-тестирования</h1>
	<h3>Выберите нужный вариант входа на сайт.</h3>
<a class="button" href="view/teacher.php"> <p>Вход для учителя</p> </a> <a class="button" href="view/student.php"> <p>Вход для ученика </p></a>
</div>


HERE;
}
require_once 'template/footer.html'; 




?>

