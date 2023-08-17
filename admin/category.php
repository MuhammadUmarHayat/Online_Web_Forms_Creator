<?php
include 'config.php';
$message = "";
$result = $con->query("SELECT * FROM categories"); 
 if($result->num_rows > 0)
 { 

 
?>

<?php include_once "header.php"; 
include_once "nav.php";
?>
<main>
  <section>

    <!-- main content here -->
    <a href="newCategory.php">New Category</a>
 

<table border=1>
    <tr>
        <td>#</td>
        <td>Title</td>
        <td>Description</td>
        <td></td>
        <td></td>
      
 </tr>

<?php

while($row = $result->fetch_assoc())
 {
    ?>
    <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['title']?></td>
    <td><?php echo $row['description']?></td>
    <td><?php echo '<a  text-decoration: none;"  href="editCategory.php?id=' . $row['id'] . '">Edit Details</a>';?></td>
    <td><?php echo '<a text-decoration: none;"  href="deleteCategory.php?id=' . $row['id'] . '">Delete Details</a>';?></td>
   
</tr> 
<?php
 }
}

?>

</tabl>
  
</section>

</main>
<?php include_once "footer.php"; ?>
