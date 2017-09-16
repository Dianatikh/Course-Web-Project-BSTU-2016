<html>
<head>
	<title>Создание теста</title>
</head>
<body>
  <?php
include ("../../bd.php");

  $Number=$_POST['Number'];
  $Title=$_POST['Title'];
  $Quest=$_POST['Quest'];
  $Options=$_POST['Options'];
  $Subject=$_POST['Subject'];
  $Opt=$_POST['Opt'];
  $Ans=$_POST['Ans'];

	//////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////
 if (!empty($Title)) {
             $result = mysqli_query($db,"SELECT `test_name` FROM  `test` WHERE `test_name`='".$Title."'");
            $myrow = mysqli_fetch_array($result);
            if (!empty($myrow['test_name'])) {
            exit ("Извините, такое имя уже есть в базе.");
            } 
     $query =  mysqli_query($db,"INSERT INTO `test` (`subject_id`,`test_name`,`count_questions`,`count_options`) VALUES ('".$Subject."','".$Title."','".$Number."','".$Options."')"); 


$res = mysqli_query($db, "SELECT `test_id` FROM `test` WHERE `test_name`='".$Title."'"); 
$testid = mysqli_fetch_array($res);

//OK
$QuestNumber=1;
$i=$Number;

while($i>0){    
    if (!empty($Quest[$QuestNumber]))
$query =  mysqli_query($db,"INSERT INTO `questions` (`question`,`test_id`) VALUES ('".$Quest[$QuestNumber]."','".$testid[0]."')"); 
else  {
    echo "<b>Error: </b> Вопрос не может быть пустым! <br>\n";
    die();
}
 $i--;
 $QuestNumber++;
    
    
 }
 

$res = mysqli_query($db, "SELECT `qid` FROM `questions` WHERE `test_id`='".$testid[0]."'"); 
for ($qid = array(); $row = mysqli_fetch_array($res); $qid[] = $row);

$QuestNumber=0;
$OptNumber=1;
$i=$Number;
$j=$Options;

while($i>=1){  
    
    $OptNumber=1;
while($j>=1){   
    $temp=$QuestNumber+1;
      
     if (!empty($Opt[$temp][$OptNumber])){
     
    if($Ans[$QuestNumber+1]==$OptNumber){
$query =  mysqli_query($db,"INSERT INTO `answers` (`qid`,`answer`,`right_answer`) VALUES ('".$qid[$QuestNumber][0]."','".$Opt[$QuestNumber+1][$OptNumber]."','1')"); 
    }
    else {
  $query =  mysqli_query($db,"INSERT INTO `answers` (`qid`,`answer`,`right_answer`) VALUES ('".$qid[$QuestNumber][0]."','".$Opt[$QuestNumber+1][$OptNumber]."','0')");
    }
     }
    else  {
    echo "<b>Error: </b> Ответ не может быть пустым! <br>\n";
    die();
    }

 $j--;
 $OptNumber++;
 }
 $j=$Options;
 $i--;
 $QuestNumber++;
 
 }
 
echo '<meta http-equiv="refresh" content="0; url=http://testkursr/view/alltest.php">';

     }

else {


    echo "<b>Error: </b> У теста должно быть название. <br>\n";
  
}





 //require_once '../../template/footer.html';
?>
  
</body>
</html>
