<?php
include 'config.php';
$message="";
$totalLimit=10;
if (isset($_POST['submit'])) ////////////////////////////////////////`generated_forms`(`id`, `category`, `short`, `long`, `mcq`, `multi`, `bool1`, `staring_date`, `ending_date`, `status`, `total_questions`, `form_name`)
{
    


   // `generated_forms`(
     //`category`, `short`, `long`, `mcq`, `multi`, `bool1`, `staring_date`, `ending_date`, `status`, `total_questions`, `form_name`)

   $category=$_POST['category'];
   $short=$_POST['short'];
   $long=$_POST['long'];
   $mcq=$_POST['mcq'];
   $multi=$_POST['multi'];
   $bool1=$_POST['bool1'];

   

   $staring_date=$_POST['staring_date'];
   $ending_date=$_POST['ending_date'];
   
   $status="active";
   $form_name=$category;
   $total_questions=$short+$long+$mcq+$multi+$bool1;
   if($total_questions==$totalLimit)
   {
   $query="INSERT INTO `generated_forms`( `category`, `short`, `long`, `mcq`, `multi`, `bool1`, `staring_date`, `ending_date`, `status`, `total_questions`, `form_name`) VALUES ('$category','$short','$long','$mcq','$multi','$bool1','$staring_date','$ending_date','$status','$total_questions','$form_name')";

    mysqli_query($con, $query);
    
    header('Location:http://localhost/webforms/admin/generateForms2.php');
   }
   else{
    $message="Please choose question in limit";
   }
}
?>


<?php include_once "header.php"; 
include_once "nav.php";
?>

   

    
    <!-- main content here -->
 
<main>
    <h2>Generate Questions </h2>
    <h3>Total Questions Limit is <?php echo $totalLimit ?></h3>
    <form action="generateForms.php" method="post">
        <table border=1>
        <tr><td>Form Title </td> <td><input type="text" id="form_name" name="form_name">  </td> </tr>
<tr><td>Choose Category </td>
 <td><select name="category">
    <option disabled selected>-- Select  Category--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT title From categories");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['title'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select> </td> </tr>
<tr><td> Total Short Questions </td> 
<td>
<select name="short" id="short">
  <option value="1">1 </option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select> 
</td> </tr>
<tr><td> Total Long Questions</td>
 <td>
 <select name="long" id="long">
  <option value="1">1 </option>
  <option value="2">2</option>
  
  
</select> 
     </td> </tr>
<tr><td>Total Multiple choice Questions </td>
 <td> 
 <select name="mcq" id="mcq">
  <option value="1">1 </option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select> 
</td> </tr>
 </td> </tr>
<tr><td>Total Multiple Select Questions </td>
 <td>
    <select name="multi" id="multi">
  <option value="1">1 </option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select>  </td> </tr>
<tr><td>Total Bolean  Questions </td> <td>
    
<select name="bool1" id="bool">
  <option value="1">1 </option>
  <option value="2">2</option>
   
</select> 
</td> </tr>
<tr><td>Starting Date  </td> <td><input type="date" id="staring_date" name="staring_date"> </td> </tr>
<tr><td> Ending Date</td> <td><input type="date" id="ending_date" name="ending_date"> </td> </tr>


<tr><td> <button type="submit" name="submit"> Submit </button> </td> <td><?php echo $message ?> </td> </tr>
         
    </table>
</form>



   

<?php include_once "footer.php"; ?>
</body>
</html>
