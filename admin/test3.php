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
   echo $question_8=$_POST['question_8'];
   echo  $question_9=$_POST['question_9'];
   echo $question_10=$_POST['question_10'];


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
    
    while ($row = $result->fetch_assoc())
     {
        

        echo '<label>' . $row['question'] . '</label><br>';

        switch ($row['questionType']) 
        {
            case 'short':
                echo '<input type="text" name="question_' . $row['id'] . '"><br>';
                break;
            case 'long':
                echo  '<textarea name="question_' . $row['id'] . '"></textarea><br>';
                break;
             case 'bool1':
                echo '<select name="question_' . $row['id'] . '">';
               echo '<option value="Yes">' . "Yes". '</option>';
               echo '<option value="No">' . "No". '</option>';
           
                echo '</select><br>';
                 break;
            case 'mcq':
                echo  '<select name="question_' . $row['id'] . '">';
                echo '<option value="">' . $row['option1'] . '</option>';
                echo '<option value="">' . $row['option2'] . '</option>';
                echo '<option value="">' . $row['option3'] . '</option>';
                echo '<option value="">' . $row['option4'] . '</option>';
                echo '</select><br>';
                break;
            case 'multi':
                echo '<input type="checkbox" name="question_' . $row['id'] . '_opt1" value="' . $row['option1'] . '">' . $row['option1'] . '<br>';
                echo '<input type="checkbox" name="question_' . $row['id'] . '_opt2" value="' . $row['option2'] . '">' . $row['option2'] . '<br>';
                echo '<input type="checkbox" name="question_' . $row['id'] . '_opt3" value="' . $row['option3'] . '">' . $row['option3'] . '<br>';
                echo '<input type="checkbox" name="question_' . $row['id'] . '_opt4" value="' . $row['option4'] . '">' . $row['option4'] . '<br>';
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