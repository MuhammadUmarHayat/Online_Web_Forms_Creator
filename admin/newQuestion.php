<?php
include 'config.php';
$message = "";
if (isset($_POST['submit'])) 
{
    //`title`, `description`,option1
    $category = $_POST['category'];
           $question=$_POST['question'];
           $questionType=$_POST['questionType'];
           $option1=$_POST['option1'];
           $option2=$_POST['option2'];
           $option3=$_POST['option3'];
           $option4=$_POST['option4'];

          $query="INSERT INTO `questions`( `category`, `question`, `questionType`,`option1`,`option2`,`option3`,`option4`) VALUES ('$category','$question','$questionType','$option1','$option2','$option3','$option4')";
          $insert = mysqli_query($con, $query);
         header('Location:http://localhost/webforms/admin/questionBank.php');

           
}
?>








<?php include_once "header.php"; 
include_once "nav.php";
?>

  
    <!-- main content here -->
 
<main>


<form method="post" action="newQuestion.php">
<div>
  
 
<table>
<tr> <td> <h3>Please fill the form</h3></td> <td> <span ></span ></td>   </tr>
<tr> <td>Category </td> <td>
<select name="category">
    <option disabled selected>-- Select  Category--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT title From categories");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['title'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td>   </tr>
<tr> <td>Question</td> <td>
<textarea id="question" name="question" rows="4" cols="50">   </textarea> 
    </td> <span >*</span ></td>   </tr>
<tr> <td>Choose Question Type</td> 
<td>
<select name="questionType" id="questionType">
  <option value="short">Short </option>
  <option value="long">Long</option>
  <option value="bool">True or False</option>
  <option value="mcq">Multiple choice </option>
  <option value="multi">Multiple Select</option>
</select>
</td>   </tr>

<tr> <td>Option 1</td> <td><input type="text" name="option1"><td> </td>   </tr>
<tr> <td>Option 2</td> <td><input type="text" name="option2"><td> </td>   </tr>
<tr> <td>Option 3</td> <td><input type="text" name="option3"><td> </td>   </tr>
<tr> <td>Option 4</td> <td><input type="text" name="option4"><td> </td>   </tr>

<tr> <td>  <button type="submit" name="submit"> Submit </button> </td>
 <td>     </tr>


</table>

</div>
</form>

</main>


   

<?php include_once "footer.php"; ?>
</body>
</html>
