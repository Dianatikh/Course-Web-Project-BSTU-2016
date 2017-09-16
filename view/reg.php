 <?php
  
    include ("../bd.php");

require_once '../template/header.html';  
?>
<html>

    <head>
        <title>Регистрация</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
    <article>
    <h2>Регистрация</h2>
    <fieldset>
    <form "register" action="../controller/save_user.php" method="post" enctype="multipart/form-data">

    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
    <label>ФИО:<br></label>
    <input name="name" type="text" size="15" maxlength="100">
    </p>      
            <p>
              <label>Ваш E-mail    *:<br></label>
              <input name="email"    type="text" size="15" maxlength="100">
            </p>
    

</fieldset>
       
<p>
    <input class="button" type="submit" name="submit" value="OK">

</p></form>
</article>
    </body>
    </html>
   <?php
    require_once '../template/footer.html'; 

?>
