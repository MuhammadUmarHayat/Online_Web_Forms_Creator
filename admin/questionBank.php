<?php
include 'config.php';
$message = "";
$result = $con->query("SELECT * FROM questions"); 
 if($result->num_rows > 0)
 { 

 
?>

<?php include_once "header.php"; 
include_once "nav.php";
?>
<main>
  <section>

    <!-- main content here -->
    <a style="color:blue; border:none" href="newQuestion.php">New Question</a>
 

<table border=1>
    <tr>
        <td>#</td>
        <td>Category</td>
        <td>Question</td>
        <td>Question Type</td>
        <td>Option 1</td>
        <td>Option 2</td>
        <td>Option 3</td>
        <td>Option 4</td>
        <td></td>
        <td></td>
      
 </tr>

<?php

while($row = $result->fetch_assoc())
 {
    //`category`, `question`, `questionType`,option1
    ?>
    <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['category']?></td>
    <td><?php echo $row['question']?></td>
    <td><?php echo $row['questionType']?></td>
    <td><?php echo $row['option1']?></td>
    <td><?php echo $row['option2']?></td>
    <td><?php echo $row['option3']?></td>
    <td><?php echo $row['option4']?></td>
    <td></td>
        <td></td>
   
</tr> 
<?php
 }
}

?>

</tabl>
  
</section>

</main>
<?php include_once "footer.php"; ?>
