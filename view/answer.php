<?php
   session_start();

    include ("../bd.php");
    $key=$_SESSION['key'];
print<<< HERE

        <link rel="stylesheet" type="text/css" href="../css/main.css">
HERE;

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
            $sid=$myrow['sid'];
            require_once '../template/header.html';  
			require_once '../template/nav_stud.html';  


/*
$i=0;
while($test[$i][0])
{
    echo $test[$i][0];
    echo "||||||||||";
    
          $res1 = mysqli_query($db, "SELECT `test_name`, FROM `test` WHERE  `test_id`='".$test[$i][0]."' ");
            $test_name[$i]  = mysqli_fetch_array($res1);
           echo $test_name[$i][0];
           echo "||||||||||";
           $i++;
}
*/
function show_list() 
{ 
    global $db;
    global $sid;
    $res = mysqli_query($db, "SELECT `test_id` FROM `result` WHERE  `sid`='".$sid."' AND  `complete`='0'  ");
    while ($test[]   = mysqli_fetch_array($res));
echo '<h2>Тесты для прохождения</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>Тест</th><th></th></tr>'; 
$i=0;
while($test[$i][0])
{ 
    
    $test_id=$test[$i][0];
    
 $res1 = mysqli_query($db, "SELECT `test_name` FROM `test` WHERE  `test_id`='$test_id' ");
    $test_name[$i] = mysqli_fetch_array($res1);
   
    echo '<tr>'; 
    echo '<td>'.$test_name[$i][0].'</td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=passform&id='.$test_id.'">Пройти тест</a></td>'; 
    echo '</tr>';  
    $i++;
}
 echo '</table>'; 
}

 
function get_pass_test_form() 
{ 
global $db;
$test_id=$_GET['id'];

$query = 'SELECT `test_name`,`count_questions`,`count_options` FROM `test` WHERE `test_id`='.$_GET['id']; 
$res = mysqli_query($db, $query); 
$test = mysqli_fetch_array($res); 

$Number=$test['count_questions'];
$Options=$test['count_options'];



  $result = mysqli_query($db,"SELECT `qid`,`question` FROM  `questions` WHERE `test_id`='".$test_id."'"); 
  $rows = mysqli_num_rows($result); 
  
    for($i = 0;$i < $rows;$i++) { 
        $Quest[$i] = mysqli_fetch_array($result); 
        //echo $Quest[$i]['question'];
    } 

$QuestNumber=0;
$k=$Number;

while($k>0){        
$qid = $Quest[$QuestNumber]['qid'];

$result1 = mysqli_query($db,"SELECT `aid`,`answer`,`right_answer` FROM  `answers` WHERE `qid`='".$qid."'"); 
$rows1 = mysqli_num_rows($result1); 
  
    for($i = 0;$i < $rows1;$i++) { 
        $Opt[ $QuestNumber][$i] = mysqli_fetch_array($result1); 
       // echo $Opt[ $QuestNumber][$i]['answer'];
       // echo "|";
} 
 $k--;
 $QuestNumber++;
}
//echo $Opt[1][1]['aid'];
    /////////////////////////////////////////////////////

//echo '<form name="passform" action="'.$_SERVER['PHP_SELF'].'?action=pass&id='.$_GET['id'].' method="GET">';     $QuestNumber=-1;     
 echo '<form name="Answers" method="post" action="answerobr.php?id='.$test_id.'" >';   
 
   $QuestNumber=-1;     
    $g = $Number;
 while ($g > 0) {
        $g--;
        $QuestNumber++;
        
        echo "<table width=\"460\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">\n";
        echo "<tr>";
        $q=$QuestNumber+1;
        echo "<td width=\"125\">Вопрос $q:</td>\n";
        $nameQ[$QuestNumber]=$Quest[$QuestNumber]['qid'];
        echo "<input type=\"hidden\" name=\"idq_$QuestNumber\" value=\"$nameQ[$QuestNumber]\">\n";
        $value = $Quest[$QuestNumber]['question'];
        echo "<td width=\"321\"> $value </td>\n";
        echo "</tr>\n"; 
    
        $OptNumber=-1;
        $i = $Options;
        while ($i >= 1) {
            $i--;
            $OptNumber++;
            $o=$OptNumber+1;
            echo "<tr>\n";
            echo "<td>&nbsp;&nbsp;&nbsp Ответ $o:</td>\n";
                   $name[$OptNumber]=$Opt[$QuestNumber][$OptNumber]['aid'];
                    $value = $Opt[$QuestNumber][$OptNumber]['answer'];
                    
            echo "<td><input name=\"nameQ_$QuestNumber\" type=\"radio\" value=\"$name[$OptNumber]\" size=\"40\">$value</td>\n";
            //echo 'nameQ_$QuestNumber';
          /* echo $nameQ[$QuestNumber];
            echo "-id vopr ";
            echo $name[$OptNumber];
            echo "-id otveta";*/
            echo "</tr>\n";
        }        
        $i = $Options;    
		$i="";
        $OptNumber = "";        
        echo "</tr>\n";
        echo "</tr>\n";
        echo "</table>\n<br><br>\n";
    }
echo "<input type=\"submit\" name=\"Submit\" value=\"Готово\">\n";
echo "</form>";
}


/* function pass_test()
{
    

}
*/











    






if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist"; 

switch ( $_GET["action"] ) 
{ 
case "showlist": 
show_list(); break; 
case "passform": 
get_pass_test_form(); break; 
case "pass": 
pass_test(); break; 
default: 
show_list(); 
}



//require_once '../template/footer.html';  
          
}
?>










