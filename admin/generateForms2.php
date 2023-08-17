<?php
include 'config.php';

$mcq=0;
   $short=0;
   $long=0;
    $multi=0;
   $bool1=0;
   $result;
   if (isset($_POST['submit'])) 
   {
    
   echo $question_1=$_POST['question_1'];
   echo $question_2=$_POST['question_2'];
   echo  $question_3=$_POST['question_3'];
   echo $question_4=$_POST['question_4'];
   echo $question_5=$_POST['question_5'];
   echo $question_6=$_POST['question_6'];
   echo $question_7=$_POST['question_7'];
   echo $question_8=$_POST['question_8_opt1'];
   echo  $question_9=$_POST['question_8_opt2'];
   echo $question_10=$_POST['question_8_opt3'];////////////////////////////////////////////////////INSERT INTO `user_reponse`(`id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `submittedDate`) VALUES ('','','','','','','','','','','','')
   $date1=date('d/m/y');
   $query="INSERT INTO `user_reponse`(`question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `submittedDate`) VALUES ('$question_1','$question_2','$question_3','$question_4','$question_5','$question_6','$question_7','$question_8','$question_9','$question_10','$date1')";
   $insert = mysqli_query($con, $query);
   header('Location:http://localhost/webforms/admin/Thankyou.php');

   }
$query="SELECT * FROM `generated_forms` ORDER BY id DESC LIMIT 1";
$result = $con->query($query);//execute the query
if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
   $mcq= $row['mcq'];
   $short= $row['short'];
   $long= $row['long'];
    $multi=$row['multi'];
   $bool1= $row['bool1'];
 

}
// Fetch questions from the database
$query1="(
    SELECT `id`, `category`, `question`, `questionType`, `option1`, `option2`, `option3`, `option4`
    FROM `questions`
    WHERE `questionType` = 'mcq'
    LIMIT $mcq
)
UNION ALL
(
    SELECT `id`, `category`, `question`, `questionType`, `option1`, `option2`, `option3`, `option4`
    FROM `questions`
    WHERE `questionType` = 'short'
    LIMIT $short
)
UNION ALL
(
    SELECT `id`, `category`, `question`, `questionType`, `option1`, `option2`, `option3`, `option4`
    FROM `questions`
    WHERE `questionType` = 'long'
    LIMIT $long
)UNION ALL
(
    SELECT `id`, `category`, `question`, `questionType`, `option1`, `option2`, `option3`, `option4`
    FROM `questions`
    WHERE `questionType` = 'long'
    LIMIT $bool1
)
UNION ALL
(
    SELECT `id`, `category`, `question`, `questionType`, `option1`, `option2`, `option3`, `option4`
    FROM `questions`
    WHERE `questionType` = 'multi'
    LIMIT $multi
)";




include_once "header.php"; 
include_once "nav.php";
?>
<h1> Form Title</h1>
<?php
//$query = "SELECT * FROM `questions`";
$result = $con->query($query1);

if ($result->num_rows > 0) 
{
    echo '<form action="generateForms2.php" method="post">'; // Change "submit.php" to your form submission endpoint
    $row = $result->fetch_assoc();
    echo '<div>';
    echo'<h3>'. $row['category'].'</h3>';
    $i=1;
    while ($row = $result->fetch_assoc())
     {
        

        echo '<label>' . $row['question'] . '</label><br>';

        switch ($row['questionType']) 
        {
            case 'short':
                echo 'Question #'.$i. '<input type="text" name="question_' . $i . '"><br>';
                $i++;
                break;
            case 'long':
                echo 'Question #'.$i. '<textarea name="question_' .$i. '"></textarea><br>';
                $i++;
                break;
             case 'bool1':
                echo 'Question #'.$i;
                echo '<select name="question_' . $i . '">';
               echo '<option value="Yes">' . "Yes". '</option>';
               echo '<option value="No">' . "No". '</option>';
                         
                echo '</select><br>';
                $i++;
                 break;
            case 'mcq':
                echo 'Question #'.$i;
                echo  '<select name="question_' . $i . '">';
                echo '<option value="">' . $row['option1'] . '</option>';
                echo '<option value="">' . $row['option2'] . '</option>';
                echo '<option value="">' . $row['option3'] . '</option>';
                echo '<option value="">' . $row['option4'] . '</option>';
                echo '</select><br>';
                $i++;
                break;
            case 'multi':
                echo 'Question #'.$i;
                echo '<input type="checkbox" name="question_' . $i. '_opt1" value="' . $row['option1'] . '">' . $row['option1'] . '<br>';
                echo '<input type="checkbox" name="question_' . $i . '_opt2" value="' . $row['option2'] . '">' . $row['option2'] . '<br>';
                echo '<input type="checkbox" name="question_' . $i . '_opt3" value="' . $row['option3'] . '">' . $row['option3'] . '<br>';
                echo '<input type="checkbox" name="question_' . $i . '_opt4" value="' . $row['option4'] . '">' . $row['option4'] . '<br>';
                $i++;
                break;
        }

        echo '</div>';
    }

    echo '<input type="submit" name="submit" value="Submit">';
    echo '</form>';
} else {
    echo 'No questions found.';
}

$con->close();
?>
<?php include_once "footer.php"; ?>
</body>
</html>