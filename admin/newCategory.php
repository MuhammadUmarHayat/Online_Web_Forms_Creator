<?php
include 'config.php';
$message = "";
if (isset($_POST['submit'])) 
{
    //`title`, `description`
    $title = $_POST['title'];
           $description=$_POST['description'];
          $query="INSERT INTO `categories`( `title`, `description`) VALUES ('$title','$description')";
           $insert = mysqli_query($con, $query);
         header('Location:http://localhost/webforms/admin/category.php');

           
}
?>








<?php include_once "header.php"; 
include_once "nav.php";
?>

  
    <!-- main content here -->
 
<main>


<form method="post" action="newCategory.php">
<div>
    
 
<table>
<tr> <td> <h3>Please fill the form</h3></td> <td> <span ></span ></td>   </tr>
<tr> <td>Name </td> <td><input type="text" name="title"><td> <span >*</span ></td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description"><td> <span >*</span ></td>   </tr>

<tr> <td>  <button type="submit" name="submit"> Submit </button> </td>
 <td>     </tr>


</table>

</div>
</form>

</main>


   

<?php include_once "footer.php"; ?>
</body>
</html>
