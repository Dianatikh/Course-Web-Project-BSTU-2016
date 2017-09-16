<?php 
include '../../bd.php';


 ?>



<html>

<head>
    <meta charset="utf-8">
    <title>STEP 1</title>
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
</head>
<header>
    <a href="../../index.php" class="logo"><img src="../../img/logo.png" width="425" height="100" alt="" /> </a>
    <br>
    <br>
    <br>
    <br>
</header>
<form name="Number" method="get" action="test_st2.php">
  <table width="500" border="0" cellspacing="1" cellpadding="1">
    <tr> 
      <td colspan="2"><strong>шаг 1:</strong></td>
    </tr>
    <tr> 
      <td width="313">Сколько вопросов будет в тексте?</td>
      <td width="71"><input name="Number" type="number" size="4" maxlength="2"></td>
    </tr>
    <tr> 
      <td>Сколько вариантов ответа? </td>
      <td><input name="Options" type="number" id="Options" size="4" maxlength="2"></td>
    </tr>
    <tr> 
     <td>Из какой категории тест? </td>
    <td>
    <select name="subject">
<?php  

  $result = mysqli_query($db,"SELECT * FROM `subject` ");  
while($row = mysqli_fetch_array($result))
{
    $id = $row['subject_id']; 
    
    $name = $row['subject_name']; 

    echo $id;
    echo $name;

    echo '<option value="'.$id.'">'.$name.'</option>'; 
}
?>

</select>
</td>

    </tr>
    <tr> 
      <td colspan="2"><div align="center"></div>
        <div align="center"> 
          <input type="submit" name="Submit" value="OK">
        </div></td>
    </tr>
  </table>
  </form>
 <?php require_once ('../../template/footer.html');
 ?>
</body>
</html>