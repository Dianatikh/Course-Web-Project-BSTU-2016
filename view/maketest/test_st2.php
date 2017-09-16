
	<?php 
   
   include ("../../bd.php");
  // require_once '../../template/header.html';  
  
  $Number=$_GET['Number'];
  $Options=$_GET['Options'];
  $Subject=$_GET['subject'];
  
 
if ($Number == "" or $Options == "") {
    echo "<b>Error:</b>Что-то вы не заполнили<br>\n";
} elseif ($Number >= 51 or $Number <= 1 or $Options >= 11 or $Options <= 1) {
    if ($Number >= 51) {
        echo "<b>Error: </b> $Number слишком много вапросов, максимум 50<br>\n";
    } 
    if ($Number <= 1) {
        echo "<b>Error: </b> $Number слишко мало вопросов, хотя бы 2<br>\n";
    } 
    if ($Options >= 11) {
        echo "<b>Error: </b> $Options слишком много вариантов ответа, не больше 10<br>\n";
    } 
    if ($Options <= 1) {
        echo "<b>Error: </b> $Options слишком мало вариантов ответа, не меньше 2<br>\n";
    } 
} else { 
print<<<HERE
<html>

<head>
    <meta charset="utf-8">
    <title>STEP 2</title>
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
</head>
<header>
    <a href="../../index.php" class="logo"><img src="../../img/logo.png" width="425" height="100" alt="" /> </a>
    <br>
    <br>
    <br>
    <br>
    <form name="Question" method="post" action="test_st3.php">
    Название:
    <input type="text" name="Title">
    <br>
    
HERE;

    
     $g = $Number;
    while ($g >= 1) {
        $g--;
        $QuestNumber++;
        echo "<table width=\"460\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">\n";
        echo "<tr>";
        echo "<td width=\"125\">Вопрос $QuestNumber:</td>\n";
        echo "<td width=\"321\"><input name=\"Quest[" . $QuestNumber . "]\" type=\"text\" value=\"\" size=\"40\"></td>\n";
        echo "</tr>\n"; 
        
        $i = $Options;
        while ($i >= 1) {
            $i--;
            $OptNumber++;
            echo "<tr>\n";
            echo "<td>&nbsp;&nbsp;&nbsp Вариант $OptNumber:</td>\n";
            echo "<td><input name=\"Opt[" . $QuestNumber . "][" . $OptNumber . "]\" type=\"text\" size=\"40\"></td>\n";
            echo "</tr>\n";
        } 
			
		$i="";
        $OptNumber = "";
		
        echo "<tr>\n";
        echo "<td>Ответ $QuestNumber:</td>\n";
        echo "<td><select name=\"Ans[" . $QuestNumber . "]\">\n"; 
       
        $i = $Options; 
        while ($i >= 1) {
            $i--;
            $OptNumber++;
            echo "<option value=\"" . $OptNumber . "\">Вариант " . $OptNumber . "</option>\n";
        } 

		$i="";
        $OptNumber = "";
		
        echo "</select></td>\n";
        echo "</tr>\n";
        echo "</tr>\n";
        echo "</table>\n<br><br>\n";
    }
		
    echo "<input type=\"hidden\" name=\"Number\" value=\"$Number\">\n";
	echo "<input type=\"hidden\" name=\"Options\" value=\"$Options\">\n";
    echo "<input type=\"hidden\" name=\"Subject\" value=\"$Subject\">\n";
	echo "<input type=\"submit\" name=\"Submit\" value=\"Дальше\">\n";
    echo "</form>"; 
} 

?>

</body>
</html>
